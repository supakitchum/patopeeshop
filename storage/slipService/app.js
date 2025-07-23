const express = require('express');
const {createCanvas, loadImage, Image} = require('canvas');
const jsQR = require('jsqr');
const fs = require('fs');
const multer = require('multer');
const {S3Client, PutObjectCommand} = require('@aws-sdk/client-s3');

const app = express();
const port = 3000;
var request = require('request');
const storage = multer.memoryStorage();
const upload = multer({storage: storage});
const mysql = require('mysql2/promise');

async function uploadImage(file, qrText) {
    try {
        const params = {
            Bucket: 'ksslips',
            Key: Date.now() + ".webp", // or generate a unique filename
            Body: file.buffer,
            ContentType: 'image/webp',
            ACL: 'public-read' // optional: makes the file public
        };

        const result = await s3.send(new PutObjectCommand(params));
        const imageUrl = `https://${params.Bucket}.s3.ap-southeast-1.amazonaws.com/${params.Key}`;
        return {
            message: 'Upload success',
            url: imageUrl,
            result: result
        };
    } catch (err) {
        return false;
    }
}

async function query(sql, params) {
    const [rows, fields] = await pool.execute(sql, params);
    return rows;
}

app.use(express.json({limit: '50mb'})); // To handle large base64 strings
function parseTransactionData(rawData) {
    // Extract the SendingBank code directly at a fixed position
    const sendingBank = rawData.substring(18, 21); // "025" is at position 20-23

    // Find the starting position of TransRef and the position of "TH"
    const transRefStart = 25;
    const transRefEnd = rawData.indexOf("TH", transRefStart);

    // If "TH" is found, slice up to that position, otherwise slice to the end
    const transRef = transRefEnd !== -1
        ? rawData.substring(transRefStart, transRefEnd)
        : rawData.substring(transRefStart);

    return {
        sendingBank: sendingBank,
        transRef: transRef.substring(0, transRef.length - 4)
    };
}

function getFormattedTimestamp() {
    const date = new Date();

    // Format date as YYYY-MM-DD
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');

    // Format time as HH:mm:ss.sss
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    const milliseconds = String(date.getMilliseconds()).padStart(3, '0');

    // Get timezone offset in hours and minutes
    const timezoneOffset = -date.getTimezoneOffset();
    const offsetHours = String(Math.floor(Math.abs(timezoneOffset) / 60)).padStart(2, '0');
    const offsetMinutes = String(Math.abs(timezoneOffset) % 60).padStart(2, '0');
    const timezoneSign = timezoneOffset >= 0 ? '+' : '-';

    // Combine all parts
    const formattedTimestamp = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}.${milliseconds}${timezoneSign}${offsetHours}:${offsetMinutes}`;

    return formattedTimestamp;
}

async function sendApi(data) {
    let token = JSON.parse(fs.readFileSync('../app/public/auth.json', 'utf8'));
    return new Promise((resolve, reject) => {
        var options = {
            'method': 'POST',
            'url': 'https://openapi.kasikornbank.com/v1/verslip/kbank/verify',
            'headers': {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token.access_token
            },
            body: JSON.stringify({
                "rqUID": "KSS" + Date.now(),
                "rqDt": getFormattedTimestamp(),
                "data": data
            }),
            cert: fs.readFileSync('../certs/ks-intershop.cert'), // Path to client certificate
            key: fs.readFileSync('../certs/ks-intershop.key'),   // Path to client private key
        };

        request(options, function (error, response) {
            if (error) {
                reject(error);
            } else {
                console.log(JSON.parse(response.body))
                resolve(JSON.parse(response.body));
            }
        });
    });
}

async function checkAuth(token) {
    try {
        const partner = await query('SELECT * FROM partners WHERE partner_token = ?', [token]);
        if (partner.length > 0) {
            return partner[0];
        }

        return false;
    } catch (e) {
        return false;
    }
}

async function checkDuplicate(qr_text) {
    try {
        const partner = await query('SELECT * FROM kbank_slips WHERE qr_text = ?', [qr_text]);
        if (partner.length > 0) {
            return true;
        }

        return false;
    } catch (e) {
        return false;
    }
}

async function insertSlip(qr_text, agent, detail, slip_name, amount) {
    try {
        const sql = 'INSERT INTO kbank_slips (qr_text,agent,detail,slip_name,amount) VALUES (?,?,?,?,?)';
        const [result] = await pool.execute(sql, [qr_text, agent, detail, slip_name, amount]);
        console.log('Inserted ID:', result.insertId);
    } catch (err) {
        console.error('Insert error:', err);
    }
}

function isNotEmpty(value) {
    if (value == null) return false; // null or undefined

    if (typeof value === 'string' && value.trim() === '') return false;

    if (Array.isArray(value) && value.length === 0) return false;

    if (typeof value === 'object' && !Array.isArray(value)) {
        return Object.keys(value).length > 0;
    }

    return true;
}


app.post('/slip', upload.single('image'), async (req, res) => {
    const auth = await checkAuth(req.body.token);
    if (!auth) {
        return res.status(403).json({message: 'Access denied'});
    }

    // return res.send({
    //     "qr_text": "0041000600000101030040220015181182201CPP073235102TH91046E58",
    //     "decode": {
    //         "sendingBank": "004",
    //         "transRef": "015181182201CPP07323"
    //     },
    //     "verify": {
    //         "rqUID": "KSS1751356828531",
    //         "kbankTxnId": "rrt-6686910664553705-c-gae2-50558-11710-1",
    //         "statusCode": "0000",
    //         "statusMessage": "SUCCESS",
    //         "data": {
    //             "language": "TH",
    //             "transRef": "015181182201CPP07323",
    //             "sendingBank": "004",
    //             "receivingBank": "",
    //             "transDate": "20250630",
    //             "transTime": "18:22:01",
    //             "sender": {
    //                 "displayName": "นาย ศุภกิจ ช",
    //                 "name": "MR. Supakit C",
    //                 "proxy": {
    //                     "type": null,
    //                     "value": null
    //                 },
    //                 "account": {
    //                     "type": "BANKAC",
    //                     "value": "xxx-x-x6800-x"
    //                 }
    //             },
    //             "receiver": {
    //                 "displayName": "นาย ศุภกิจ ช",
    //                 "name": "SUPAKIT C",
    //                 "proxy": {
    //                     "type": "MSISDN",
    //                     "value": "xxx-xxx-9050"
    //                 },
    //                 "account": {
    //                     "type": "",
    //                     "value": ""
    //                 }
    //             },
    //             "amount": 200,
    //             "paidLocalAmount": 200,
    //             "paidLocalCurrency": "764",
    //             "countryCode": "TH",
    //             "transFeeAmount": 0,
    //             "ref1": "",
    //             "ref2": "",
    //             "ref3": "",
    //             "toMerchantId": ""
    //         }
    //     },
    //     "slip": "https://ksslips.s3.ap-southeast-1.amazonaws.com/0041000600000101030040220015172231926CPP005055102TH91044661.webp"
    // });

    // Access the file buffer directly
    const fileBuffer = req.file.buffer;

    // Encode to base64
    const base64Image = fileBuffer.toString('base64');

    try {
        const qrText = await readQRCodeFromBase64(base64Image);
        const dup = await checkDuplicate(qrText);
        if (dup) {
            return res.status(400).json({message: 'สลิปซ้ำ'});
        }

        const decode = parseTransactionData(qrText);
        const verify = await sendApi(decode);
        const up = await uploadImage(req.file, qrText);
        if (isNotEmpty(verify.statusCode) && verify.statusCode === "0000" && verify.data.receiver.name === "K.S. INTERNATIONAL M") {
            await insertSlip(qrText, auth.id, JSON.stringify(verify), up.url, verify.data.amount);
            return res.json({
                qr: qrText,
                decode: decode,
                verify: verify,
                slip: up.url
            });
        }

        return res.status(400).json({
            message: "ไม่สามารถตรวจสอบสลิปนี้ได้",
            decode: decode,
            qrText: qrText,
            verify: verify,
            slip: up.url
        });
    } catch (error) {
        return res.status(400).json({message: "สลิปไม่ถูกต้อง"});
    }
});

app.post('/read-qr-code', async (req, res) => {
    const base64Image = req.body.base64_image;

    try {
        const qrText = await readQRCodeFromBase64(base64Image);
        res.json({qr_text: qrText});
    } catch (error) {
        res.status(400).json({error: error.message});
    }
});

app.post('/slip2', async (req, res) => {
    const qrText = req.body.qr_text;

    try {
        var options = {
            'method': 'POST',
            'url': 'https://qrew.krungsri.com/api/payment/miniQR',
            'headers': {
                'Host': 'qrew.krungsri.com',
                'User-Agent': 'mongkon/2.0 CFNetwork/1410.0.3 Darwin/22.6.0',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                "mini_qr": qrText
            })

        };
        request(options, function (error, response) {
            if (error) throw new Error(error);
            res.json(JSON.parse(response.body));
        });
    } catch (error) {
        res.status(400).json({error: error.message});
    }
});

app.get('/', async (req, res) => {
    res.json({status: "ready"});
});

async function readQRCodeFromBase64(base64String) {
    // Decode the base64 string to a buffer
    const buffer = Buffer.from(base64String, 'base64');

    // Load the image from the buffer
    const img = new Image();
    img.src = buffer;

    // Create a canvas and draw the image
    const canvas = createCanvas(img.width, img.height);
    const context = canvas.getContext('2d');
    context.drawImage(img, 0, 0, img.width, img.height);

    // Get image data from the canvas
    const imageData = context.getImageData(0, 0, img.width, img.height);

    // Use jsQR to decode QR code
    const code = jsQR(imageData.data, imageData.width, imageData.height);

    if (code) {
        return code.data;
    } else {
        throw new Error('No QR code found in the image.');
    }
}

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
