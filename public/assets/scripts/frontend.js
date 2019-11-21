/*!
 * bootstrap-fileinput v5.0.7
 * http://plugins.krajee.com/file-input
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2019, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD-3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
(function (factory) {
    'use strict';
    //noinspection JSUnresolvedVariable
    if (typeof define === 'function' && define.amd) { // jshint ignore:line
        // AMD. Register as an anonymous module.
        define(['jquery'], factory); // jshint ignore:line
    } else { // noinspection JSUnresolvedVariable
        if (typeof module === 'object' && module.exports) { // jshint ignore:line
            // Node/CommonJS
            // noinspection JSUnresolvedVariable
            module.exports = factory(require('jquery')); // jshint ignore:line
        } else {
            // Browser globals
            factory(window.jQuery);
        }
    }
}(function ($) {
    'use strict';

    $.fn.fileinputLocales = {};
    $.fn.fileinputThemes = {};

    String.prototype.setTokens = function (replacePairs) {
        var str = this.toString(), key, re;
        for (key in replacePairs) {
            if (replacePairs.hasOwnProperty(key)) {
                re = new RegExp('\{' + key + '\}', 'g');
                str = str.replace(re, replacePairs[key]);
            }
        }
        return str;
    };

    var $h, FileInput;

    // fileinput helper object for all global variables and internal helper methods
    //noinspection JSUnresolvedVariable
    $h = {
        FRAMES: '.kv-preview-thumb',
        SORT_CSS: 'file-sortable',
        INIT_FLAG: 'init-',
        OBJECT_PARAMS: '<param name="controller" value="true" />\n' +
            '<param name="allowFullScreen" value="true" />\n' +
            '<param name="allowScriptAccess" value="always" />\n' +
            '<param name="autoPlay" value="false" />\n' +
            '<param name="autoStart" value="false" />\n' +
            '<param name="quality" value="high" />\n',
        DEFAULT_PREVIEW: '<div class="file-preview-other">\n' +
            '<span class="{previewFileIconClass}">{previewFileIcon}</span>\n' +
            '</div>',
        MODAL_ID: 'kvFileinputModal',
        MODAL_EVENTS: ['show', 'shown', 'hide', 'hidden', 'loaded'],
        logMessages: {
            ajaxError: '{status}: {error}. Error Details: {text}.',
            badDroppedFiles: 'Error scanning dropped files!',
            badExifParser: 'Error loading the piexif.js library. {details}',
            badInputType: 'The input "type" must be set to "file" for initializing the "bootstrap-fileinput" plugin.',
            exifWarning: 'To avoid this warning, either set "autoOrientImage" to "false" OR ensure you have loaded ' +
                'the "piexif.js" library correctly on your page before the "fileinput.js" script.',
            invalidChunkSize: 'Invalid upload chunk size: "{chunkSize}". Resumable uploads are disabled.',
            invalidThumb: 'Invalid thumb frame with id: "{id}".',
            noResumableSupport: 'The browser does not support resumable or chunk uploads.',
            noUploadUrl: 'The "uploadUrl" is not set. Ajax uploads and resumable uploads have been disabled.',
            retryStatus: 'Retrying upload for chunk # {chunk} for {filename}... retry # {retry}.'
        },
        objUrl: window.URL || window.webkitURL,
        now: function () {
            return new Date();
        },
        round: function (num) {
            num = parseFloat(num);
            return isNaN(num) ? 0 : Math.floor(Math.round(num));
        },
        getFileRelativePath: function (file) {
            /** @namespace file.relativePath */
            /** @namespace file.webkitRelativePath */
            return String(file.relativePath || file.webkitRelativePath || $h.getFileName(file) || null);

        },
        getFileId: function (file, generateFileId) {
            var relativePath = $h.getFileRelativePath(file);
            if (typeof generateFileId === 'function') {
                return generateFileId(file);
            }
            if (!file) {
                return null;
            }
            if (!relativePath) {
                return null;
            }
            return (file.size + '_' + relativePath.replace(/\s/img, '_'));
        },
        getFrameSelector: function (id, selector) {
            selector = selector || '';
            return '[id="' + id + '"]' + selector;
        },
        getZoomSelector: function (id, selector) {
            selector = selector || '';
            return '[id="zoom-' + id + '"]' + selector;
        },
        getFrameElement: function ($element, id, selector) {
            return $element.find($h.getFrameSelector(id, selector));
        },
        getZoomElement: function ($element, id, selector) {
            return $element.find($h.getZoomSelector(id, selector));
        },
        getElapsed: function (seconds) {
            var delta = seconds, out = '', result = {}, structure = {
                year: 31536000,
                month: 2592000,
                week: 604800, // uncomment row to ignore
                day: 86400,   // feel free to add your own row
                hour: 3600,
                minute: 60,
                second: 1
            };
            Object.keys(structure).forEach(function (key) {
                result[key] = Math.floor(delta / structure[key]);
                delta -= result[key] * structure[key];
            });
            $.each(result, function (key, value) {
                if (value > 0) {
                    out += (out ? ' ' : '') + value + key.substring(0, 1);
                }
            });
            return out;
        },
        debounce: function (func, delay) {
            var inDebounce;
            return function () {
                var args = arguments, context = this;
                clearTimeout(inDebounce);
                inDebounce = setTimeout(function () {
                    func.apply(context, args);
                }, delay);
            };
        },
        stopEvent: function (e) {
            e.stopPropagation();
            e.preventDefault();
        },
        getFileName: function (file) {
            /** @namespace file.fileName */
            return file ? (file.fileName || file.name || '') : ''; // some confusion in different versions of Firefox
        },
        createObjectURL: function (data) {
            if ($h.objUrl && $h.objUrl.createObjectURL && data) {
                return $h.objUrl.createObjectURL(data);
            }
            return '';
        },
        revokeObjectURL: function (data) {
            if ($h.objUrl && $h.objUrl.revokeObjectURL && data) {
                $h.objUrl.revokeObjectURL(data);
            }
        },
        compare: function (input, str, exact) {
            return input !== undefined && (exact ? input === str : input.match(str));
        },
        isIE: function (ver) {
            var div, status;
            // check for IE versions < 11
            if (navigator.appName !== 'Microsoft Internet Explorer') {
                return false;
            }
            if (ver === 10) {
                return new RegExp('msie\\s' + ver, 'i').test(navigator.userAgent);
            }
            div = document.createElement('div');
            div.innerHTML = '<!--[if IE ' + ver + ']> <i></i> <![endif]-->';
            status = div.getElementsByTagName('i').length;
            document.body.appendChild(div);
            div.parentNode.removeChild(div);
            return status;
        },
        canAssignFilesToInput: function () {
            var input = document.createElement('input');
            try {
                input.type = 'file';
                input.files = null;
                return true;
            } catch (err) {
                return false;
            }
        },
        getDragDropFolders: function (items) {
            var i, item, len = items ? items.length : 0, folders = 0;
            if (len > 0 && items[0].webkitGetAsEntry()) {
                for (i = 0; i < len; i++) {
                    item = items[i].webkitGetAsEntry();
                    if (item && item.isDirectory) {
                        folders++;
                    }
                }
            }
            return folders;
        },
        initModal: function ($modal) {
            var $body = $('body');
            if ($body.length) {
                $modal.appendTo($body);
            }
        },
        isFunction: function (v) {
            return typeof v === 'function';
        },
        isEmpty: function (value, trim) {
            return value === undefined || value === null || (!$h.isFunction(value) && (value.length === 0 || (trim && $.trim(value) === '')));
        },
        isArray: function (a) {
            return Array.isArray(a) || Object.prototype.toString.call(a) === '[object Array]';
        },
        ifSet: function (needle, haystack, def) {
            def = def || '';
            return (haystack && typeof haystack === 'object' && needle in haystack) ? haystack[needle] : def;
        },
        cleanArray: function (arr) {
            if (!(arr instanceof Array)) {
                arr = [];
            }
            return arr.filter(function (e) {
                return (e !== undefined && e !== null);
            });
        },
        spliceArray: function (arr, index, reverseOrder) {
            var i, j = 0, out = [], newArr;
            if (!(arr instanceof Array)) {
                return [];
            }
            newArr = $.extend(true, [], arr);
            if (reverseOrder) {
                newArr.reverse();
            }
            for (i = 0; i < newArr.length; i++) {
                if (i !== index) {
                    out[j] = newArr[i];
                    j++;
                }
            }
            if (reverseOrder) {
                out.reverse();
            }
            return out;
        },
        getNum: function (num, def) {
            def = def || 0;
            if (typeof num === 'number') {
                return num;
            }
            if (typeof num === 'string') {
                num = parseFloat(num);
            }
            return isNaN(num) ? def : num;
        },
        hasFileAPISupport: function () {
            return !!(window.File && window.FileReader);
        },
        hasDragDropSupport: function () {
            var div = document.createElement('div');
            /** @namespace div.draggable */
            /** @namespace div.ondragstart */
            /** @namespace div.ondrop */
            return !$h.isIE(9) &&
                (div.draggable !== undefined || (div.ondragstart !== undefined && div.ondrop !== undefined));
        },
        hasFileUploadSupport: function () {
            return $h.hasFileAPISupport() && window.FormData;
        },
        hasBlobSupport: function () {
            try {
                return !!window.Blob && Boolean(new Blob());
            } catch (e) {
                return false;
            }
        },
        hasArrayBufferViewSupport: function () {
            try {
                return new Blob([new Uint8Array(100)]).size === 100;
            } catch (e) {
                return false;
            }
        },
        hasResumableUploadSupport: function () {
            /** @namespace Blob.prototype.webkitSlice */
            /** @namespace Blob.prototype.mozSlice */
            return $h.hasFileUploadSupport() && $h.hasBlobSupport() && $h.hasArrayBufferViewSupport() &&
                (!!Blob.prototype.webkitSlice || !!Blob.prototype.mozSlice || !!Blob.prototype.slice || false);
        },
        dataURI2Blob: function (dataURI) {
            //noinspection JSUnresolvedVariable
            var BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder ||
                window.MSBlobBuilder, canBlob = $h.hasBlobSupport(), byteStr, arrayBuffer, intArray, i, mimeStr, bb,
                canProceed = (canBlob || BlobBuilder) && window.atob && window.ArrayBuffer && window.Uint8Array;
            if (!canProceed) {
                return null;
            }
            if (dataURI.split(',')[0].indexOf('base64') >= 0) {
                byteStr = atob(dataURI.split(',')[1]);
            } else {
                byteStr = decodeURIComponent(dataURI.split(',')[1]);
            }
            arrayBuffer = new ArrayBuffer(byteStr.length);
            intArray = new Uint8Array(arrayBuffer);
            for (i = 0; i < byteStr.length; i += 1) {
                intArray[i] = byteStr.charCodeAt(i);
            }
            mimeStr = dataURI.split(',')[0].split(':')[1].split(';')[0];
            if (canBlob) {
                return new Blob([$h.hasArrayBufferViewSupport() ? intArray : arrayBuffer], {type: mimeStr});
            }
            bb = new BlobBuilder();
            bb.append(arrayBuffer);
            return bb.getBlob(mimeStr);
        },
        arrayBuffer2String: function (buffer) {
            //noinspection JSUnresolvedVariable
            if (window.TextDecoder) {
                // noinspection JSUnresolvedFunction
                return new TextDecoder('utf-8').decode(buffer);
            }
            var array = Array.prototype.slice.apply(new Uint8Array(buffer)), out = '', i = 0, len, c, char2, char3;
            len = array.length;
            while (i < len) {
                c = array[i++];
                switch (c >> 4) { // jshint ignore:line
                    case 0:
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                        // 0xxxxxxx
                        out += String.fromCharCode(c);
                        break;
                    case 12:
                    case 13:
                        // 110x xxxx   10xx xxxx
                        char2 = array[i++];
                        out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F)); // jshint ignore:line
                        break;
                    case 14:
                        // 1110 xxxx  10xx xxxx  10xx xxxx
                        char2 = array[i++];
                        char3 = array[i++];
                        out += String.fromCharCode(((c & 0x0F) << 12) | // jshint ignore:line
                            ((char2 & 0x3F) << 6) |  // jshint ignore:line
                            ((char3 & 0x3F) << 0)); // jshint ignore:line
                        break;
                }
            }
            return out;
        },
        isHtml: function (str) {
            var a = document.createElement('div');
            a.innerHTML = str;
            for (var c = a.childNodes, i = c.length; i--;) {
                if (c[i].nodeType === 1) {
                    return true;
                }
            }
            return false;
        },
        isSvg: function (str) {
            return str.match(/^\s*<\?xml/i) && (str.match(/<!DOCTYPE svg/i) || str.match(/<svg/i));
        },
        getMimeType: function (signature, contents, type) {
            switch (signature) {
                case 'ffd8ffe0':
                case 'ffd8ffe1':
                case 'ffd8ffe2':
                    return 'image/jpeg';
                case '89504E47':
                    return 'image/png';
                case '47494638':
                    return 'image/gif';
                case '49492a00':
                    return 'image/tiff';
                case '52494646':
                    return 'image/webp';
                case '66747970':
                    return 'video/3gp';
                case '4f676753':
                    return 'video/ogg';
                case '1a45dfa3':
                    return 'video/mkv';
                case '000001ba':
                case '000001b3':
                    return 'video/mpeg';
                case '3026b275':
                    return 'video/wmv';
                case '25504446':
                    return 'application/pdf';
                case '25215053':
                    return 'application/ps';
                case '504b0304':
                case '504b0506':
                case '504b0508':
                    return 'application/zip';
                case '377abcaf':
                    return 'application/7z';
                case '75737461':
                    return 'application/tar';
                case '7801730d':
                    return 'application/dmg';
                default:
                    switch (signature.substring(0, 6)) {
                        case '435753':
                            return 'application/x-shockwave-flash';
                        case '494433':
                            return 'audio/mp3';
                        case '425a68':
                            return 'application/bzip';
                        default:
                            switch (signature.substring(0, 4)) {
                                case '424d':
                                    return 'image/bmp';
                                case 'fffb':
                                    return 'audio/mp3';
                                case '4d5a':
                                    return 'application/exe';
                                case '1f9d':
                                case '1fa0':
                                    return 'application/zip';
                                case '1f8b':
                                    return 'application/gzip';
                                default:
                                    return contents && !contents.match(
                                        /[^\u0000-\u007f]/) ? 'application/text-plain' : type;
                            }
                    }
            }
        },
        addCss: function ($el, css) {
            $el.removeClass(css).addClass(css);
        },
        getElement: function (options, param, value) {
            return ($h.isEmpty(options) || $h.isEmpty(options[param])) ? value : $(options[param]);
        },
        uniqId: function () {
            return Math.round(new Date().getTime()) + '_' + Math.round(Math.random() * 100);
        },
        htmlEncode: function (str, undefVal) {
            if (str === undefined) {
                return undefVal || null;
            }
            return str.replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&apos;');
        },
        replaceTags: function (str, tags) {
            var out = str;
            if (!tags) {
                return out;
            }
            $.each(tags, function (key, value) {
                if (typeof value === 'function') {
                    value = value();
                }
                out = out.split(key).join(value);
            });
            return out;
        },
        cleanMemory: function ($thumb) {
            var data = $thumb.is('img') ? $thumb.attr('src') : $thumb.find('source').attr('src');
            $h.revokeObjectURL(data);
        },
        findFileName: function (filePath) {
            var sepIndex = filePath.lastIndexOf('/');
            if (sepIndex === -1) {
                sepIndex = filePath.lastIndexOf('\\');
            }
            return filePath.split(filePath.substring(sepIndex, sepIndex + 1)).pop();
        },
        checkFullScreen: function () {
            //noinspection JSUnresolvedVariable
            return document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ||
                document.msFullscreenElement;
        },
        toggleFullScreen: function (maximize) {
            var doc = document, de = doc.documentElement;
            if (de && maximize && !$h.checkFullScreen()) {
                /** @namespace document.requestFullscreen */
                /** @namespace document.msRequestFullscreen */
                /** @namespace document.mozRequestFullScreen */
                /** @namespace document.webkitRequestFullscreen */
                /** @namespace Element.ALLOW_KEYBOARD_INPUT */
                if (de.requestFullscreen) {
                    de.requestFullscreen();
                } else {
                    if (de.msRequestFullscreen) {
                        de.msRequestFullscreen();
                    } else {
                        if (de.mozRequestFullScreen) {
                            de.mozRequestFullScreen();
                        } else {
                            if (de.webkitRequestFullscreen) {
                                de.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                            }
                        }
                    }
                }
            } else {
                /** @namespace document.exitFullscreen */
                /** @namespace document.msExitFullscreen */
                /** @namespace document.mozCancelFullScreen */
                /** @namespace document.webkitExitFullscreen */
                if (doc.exitFullscreen) {
                    doc.exitFullscreen();
                } else {
                    if (doc.msExitFullscreen) {
                        doc.msExitFullscreen();
                    } else {
                        if (doc.mozCancelFullScreen) {
                            doc.mozCancelFullScreen();
                        } else {
                            if (doc.webkitExitFullscreen) {
                                doc.webkitExitFullscreen();
                            }
                        }
                    }
                }
            }
        },
        moveArray: function (arr, oldIndex, newIndex, reverseOrder) {
            var newArr = $.extend(true, [], arr);
            if (reverseOrder) {
                newArr.reverse();
            }
            if (newIndex >= newArr.length) {
                var k = newIndex - newArr.length;
                while ((k--) + 1) {
                    newArr.push(undefined);
                }
            }
            newArr.splice(newIndex, 0, newArr.splice(oldIndex, 1)[0]);
            if (reverseOrder) {
                newArr.reverse();
            }
            return newArr;
        },
        cleanZoomCache: function ($el) {
            var $cache = $el.closest('.kv-zoom-cache-theme');
            if (!$cache.length) {
                $cache = $el.closest('.kv-zoom-cache');
            }
            $cache.remove();
        },
        closeButton: function (css) {
            css = css ? 'close ' + css : 'close';
            return '<button type="button" class="' + css + '" aria-label="Close">\n' +
                '  <span aria-hidden="true">&times;</span>\n' +
                '</button>';
        },
        getRotation: function (value) {
            switch (value) {
                case 2:
                    return 'rotateY(180deg)';
                case 3:
                    return 'rotate(180deg)';
                case 4:
                    return 'rotate(180deg) rotateY(180deg)';
                case 5:
                    return 'rotate(270deg) rotateY(180deg)';
                case 6:
                    return 'rotate(90deg)';
                case 7:
                    return 'rotate(90deg) rotateY(180deg)';
                case 8:
                    return 'rotate(270deg)';
                default:
                    return '';
            }
        },
        setTransform: function (el, val) {
            if (!el) {
                return;
            }
            el.style.transform = val;
            el.style.webkitTransform = val;
            el.style['-moz-transform'] = val;
            el.style['-ms-transform'] = val;
            el.style['-o-transform'] = val;
        }
    };
    FileInput = function (element, options) {
        var self = this;
        self.$element = $(element);
        self.$parent = self.$element.parent();
        if (!self._validate()) {
            return;
        }
        self.isPreviewable = $h.hasFileAPISupport();
        self.isIE9 = $h.isIE(9);
        self.isIE10 = $h.isIE(10);
        if (self.isPreviewable || self.isIE9) {
            self._init(options);
            self._listen();
        }
        self.$element.removeClass('file-loading');
    };
    //noinspection JSUnusedGlobalSymbols
    FileInput.prototype = {
        constructor: FileInput,
        _cleanup: function () {
            var self = this;
            self.reader = null;
            self.clearFileStack();
            self.fileBatchCompleted = true;
            self.isError = false;
            self.cancelling = false;
            self.paused = false;
            self.lastProgress = 0;
            self._initAjax();
        },
        _initAjax: function () {
            var self = this;
            self.ajaxQueue = [];
            self.ajaxRequests = [];
            self.ajaxQueueIntervalId = null;
            self.ajaxCurrentThreads = 0;
            self.ajaxAborted = false;
        },
        _init: function (options, refreshMode) {
            var self = this, f, $el = self.$element, $cont, t, tmp;
            self.options = options;
            $.each(options, function (key, value) {
                switch (key) {
                    case 'minFileCount':
                    case 'maxFileCount':
                    case 'maxTotalFileCount':
                    case 'minFileSize':
                    case 'maxFileSize':
                    case 'maxFilePreviewSize':
                    case 'resizeImageQuality':
                    case 'resizeIfSizeMoreThan':
                    case 'progressUploadThreshold':
                    case 'initialPreviewCount':
                    case 'zoomModalHeight':
                    case 'minImageHeight':
                    case 'maxImageHeight':
                    case 'minImageWidth':
                    case 'maxImageWidth':
                        self[key] = $h.getNum(value);
                        break;
                    default:
                        self[key] = value;
                        break;
                }
            });
            if (self.maxTotalFileCount > 0 && self.maxTotalFileCount < self.maxFileCount) {
                self.maxTotalFileCount = self.maxFileCount;
            }
            if (self.rtl) { // swap buttons for rtl
                tmp = self.previewZoomButtonIcons.prev;
                self.previewZoomButtonIcons.prev = self.previewZoomButtonIcons.next;
                self.previewZoomButtonIcons.next = tmp;
            }
            // validate chunk threads to not exceed maxAjaxThreads
            if (!isNaN(self.maxAjaxThreads) && self.maxAjaxThreads < self.resumableUploadOptions.maxThreads) {
                self.resumableUploadOptions.maxThreads = self.maxAjaxThreads;
            }
            self._initFileManager();
            if (typeof self.autoOrientImage === 'function') {
                self.autoOrientImage = self.autoOrientImage();
            }
            if (typeof self.autoOrientImageInitial === 'function') {
                self.autoOrientImageInitial = self.autoOrientImageInitial();
            }
            if (!refreshMode) {
                self._cleanup();
            }
            self.$form = $el.closest('form');
            self._initTemplateDefaults();
            self.uploadFileAttr = !$h.isEmpty($el.attr('name')) ? $el.attr('name') : 'file_data';
            t = self._getLayoutTemplate('progress');
            self.progressTemplate = t.replace('{class}', self.progressClass);
            self.progressInfoTemplate = t.replace('{class}', self.progressInfoClass);
            self.progressPauseTemplate = t.replace('{class}', self.progressPauseClass);
            self.progressCompleteTemplate = t.replace('{class}', self.progressCompleteClass);
            self.progressErrorTemplate = t.replace('{class}', self.progressErrorClass);
            self.isDisabled = $el.attr('disabled') || $el.attr('readonly');
            if (self.isDisabled) {
                $el.attr('disabled', true);
            }
            self.isClickable = self.browseOnZoneClick && self.showPreview &&
                (self.dropZoneEnabled || !$h.isEmpty(self.defaultPreviewContent));
            self.isAjaxUpload = $h.hasFileUploadSupport() && !$h.isEmpty(self.uploadUrl);
            self.dropZoneEnabled = $h.hasDragDropSupport() && self.dropZoneEnabled;
            if (!self.isAjaxUpload) {
                self.dropZoneEnabled = self.dropZoneEnabled && $h.canAssignFilesToInput();
            }
            self.slug = typeof options.slugCallback === 'function' ? options.slugCallback : self._slugDefault;
            self.mainTemplate = self.showCaption ? self._getLayoutTemplate('main1') : self._getLayoutTemplate('main2');
            self.captionTemplate = self._getLayoutTemplate('caption');
            self.previewGenericTemplate = self._getPreviewTemplate('generic');
            if (!self.imageCanvas && self.resizeImage && (self.maxImageWidth || self.maxImageHeight)) {
                self.imageCanvas = document.createElement('canvas');
                self.imageCanvasContext = self.imageCanvas.getContext('2d');
            }
            if ($h.isEmpty($el.attr('id'))) {
                $el.attr('id', $h.uniqId());
            }
            self.namespace = '.fileinput_' + $el.attr('id').replace(/-/g, '_');
            if (self.$container === undefined) {
                self.$container = self._createContainer();
            } else {
                self._refreshContainer();
            }
            $cont = self.$container;
            self.$dropZone = $cont.find('.file-drop-zone');
            self.$progress = $cont.find('.kv-upload-progress');
            self.$btnUpload = $cont.find('.fileinput-upload');
            self.$captionContainer = $h.getElement(options, 'elCaptionContainer', $cont.find('.file-caption'));
            self.$caption = $h.getElement(options, 'elCaptionText', $cont.find('.file-caption-name'));
            if (!$h.isEmpty(self.msgPlaceholder)) {
                f = $el.attr('multiple') ? self.filePlural : self.fileSingle;
                self.$caption.attr('placeholder', self.msgPlaceholder.replace('{files}', f));
            }
            self.$captionIcon = self.$captionContainer.find('.file-caption-icon');
            self.$previewContainer = $h.getElement(options, 'elPreviewContainer', $cont.find('.file-preview'));
            self.$preview = $h.getElement(options, 'elPreviewImage', $cont.find('.file-preview-thumbnails'));
            self.$previewStatus = $h.getElement(options, 'elPreviewStatus', $cont.find('.file-preview-status'));
            self.$errorContainer = $h.getElement(options, 'elErrorContainer',
                self.$previewContainer.find('.kv-fileinput-error'));
            self._validateDisabled();
            if (!$h.isEmpty(self.msgErrorClass)) {
                $h.addCss(self.$errorContainer, self.msgErrorClass);
            }
            if (!refreshMode) {
                self.$errorContainer.hide();
                self.previewInitId = 'thumb-' + $el.attr('id');
                self._initPreviewCache();
                self._initPreview(true);
                self._initPreviewActions();
                if (self.$parent.hasClass('file-loading')) {
                    self.$container.insertBefore(self.$parent);
                    self.$parent.remove();
                }
            } else {
                if (!self._errorsExist()) {
                    self.$errorContainer.hide();
                }
            }
            self._setFileDropZoneTitle();
            if ($el.attr('disabled')) {
                self.disable();
            }
            self._initZoom();
            if (self.hideThumbnailContent) {
                $h.addCss(self.$preview, 'hide-content');
            }
        },
        _initFileManager: function () {
            var self = this;
            self.fileManager = {
                stack: {},
                processed: [],
                errors: [],
                loadedImages: {},
                totalImages: 0,
                totalFiles: null,
                totalSize: null,
                uploadedSize: 0,
                stats: {},
                initStats: function (id) {
                    var data = {started: $h.now().getTime()};
                    if (id) {
                        self.fileManager.stats[id] = data;
                    } else {
                        self.fileManager.stats = data;
                    }
                },
                getUploadStats: function (id, loaded, total) {
                    var fm = self.fileManager, started = id ? fm.stats[id] && fm.stats[id].started || null : null;
                    if (!started) {
                        started = $h.now().getTime();
                    }
                    var elapsed = ($h.now().getTime() - started) / 1000,
                        speeds = ['B/s', 'KB/s', 'MB/s', 'GB/s', 'TB/s', 'PB/s', 'EB/s', 'ZB/s', 'YB/s'],
                        bps = elapsed ? loaded / elapsed : 0, bitrate = self._getSize(bps, speeds),
                        pendingBytes = total - loaded,
                        out = {
                            fileId: id,
                            started: started,
                            elapsed: elapsed,
                            loaded: loaded,
                            total: total,
                            bps: bps,
                            bitrate: bitrate,
                            pendingBytes: pendingBytes
                        };
                    if (id) {
                        fm.stats[id] = out;
                    } else {
                        fm.stats = out;
                    }
                    return out;
                },
                exists: function (id) {
                    return $.inArray(id, self.fileManager.getIdList()) !== -1;
                },
                count: function () {
                    return self.fileManager.getIdList().length;
                },
                total: function () {
                    var fm = self.fileManager;
                    if (!fm.totalFiles) {
                        fm.totalFiles = fm.count();
                    }
                    return fm.totalFiles;
                },
                getTotalSize: function () {
                    var fm = self.fileManager;
                    if (fm.totalSize) {
                        return fm.totalSize;
                    }
                    fm.totalSize = 0;
                    $.each(self.fileManager.stack, function (id, f) {
                        var size = parseFloat(f.size);
                        fm.totalSize += isNaN(size) ? 0 : size;
                    });
                    return fm.totalSize;
                },
                add: function (file, id) {
                    if (!id) {
                        id = self.fileManager.getId(file);
                    }
                    if (!id) {
                        return;
                    }
                    self.fileManager.stack[id] = {
                        file: file,
                        name: $h.getFileName(file),
                        relativePath: $h.getFileRelativePath(file),
                        size: file.size,
                        nameFmt: self._getFileName(file, ''),
                        sizeFmt: self._getSize(file.size)
                    };
                },
                remove: function ($thumb) {
                    var id = $thumb.attr('data-fileid');
                    if (id) {
                        self.fileManager.removeFile(id);
                    }
                },
                removeFile: function (id) {
                    delete self.fileManager.stack[id];
                    delete self.fileManager.loadedImages[id];
                },
                move: function (idFrom, idTo) {
                    var result = {}, stack = self.fileManager.stack;
                    if (!idFrom && !idTo || idFrom === idTo) {
                        return;
                    }
                    $.each(stack, function (k, v) {
                        if (k !== idFrom) {
                            result[k] = v;
                        }
                        if (k === idTo) {
                            result[idFrom] = stack[idFrom];
                        }
                    });
                    self.fileManager.stack = result;
                },
                list: function () {
                    var files = [];
                    $.each(self.fileManager.stack, function (k, v) {
                        if (v && v.file) {
                            files.push(v.file);
                        }
                    });
                    return files;
                },
                isPending: function (id) {
                    return $.inArray(id, self.fileManager.processed) === -1 && self.fileManager.exists(id);
                },
                isProcessed: function () {
                    var processed = true, fm = self.fileManager;
                    $.each(fm.stack, function (id) {
                        if (fm.isPending(id)) {
                            processed = false;
                        }
                    });
                    return processed;
                },
                clear: function () {
                    var fm = self.fileManager;
                    fm.totalFiles = null;
                    fm.totalSize = null;
                    fm.uploadedSize = 0;
                    fm.stack = {};
                    fm.errors = [];
                    fm.processed = [];
                    fm.stats = {};
                    fm.clearImages();
                },
                clearImages: function () {
                    self.fileManager.loadedImages = {};
                    self.fileManager.totalImages = 0;
                },
                addImage: function (id, config) {
                    self.fileManager.loadedImages[id] = config;
                },
                removeImage: function (id) {
                    delete self.fileManager.loadedImages[id];
                },
                getImageIdList: function () {
                    return Object.keys(self.fileManager.loadedImages);
                },
                getImageCount: function () {
                    return self.fileManager.getImageIdList().length;
                },
                getId: function (file) {
                    return self._getFileId(file);
                },
                getIndex: function (id) {
                    return self.fileManager.getIdList().indexOf(id);
                },
                getThumb: function (id) {
                    var $thumb = null;
                    self._getThumbs().each(function () {
                        var $t = $(this);
                        if ($t.attr('data-fileid') === id) {
                            $thumb = $t;
                        }
                    });
                    return $thumb;
                },
                getThumbIndex: function ($thumb) {
                    var id = $thumb.attr('data-fileid');
                    return self.fileManager.getIndex(id);
                },
                getIdList: function () {
                    return Object.keys(self.fileManager.stack);
                },
                getFile: function (id) {
                    return self.fileManager.stack[id] || null;
                },
                getFileName: function (id, fmt) {
                    var file = self.fileManager.getFile(id);
                    if (!file) {
                        return '';
                    }
                    return fmt ? (file.nameFmt || '') : file.name || '';
                },
                getFirstFile: function () {
                    var ids = self.fileManager.getIdList(), id = ids && ids.length ? ids[0] : null;
                    return self.fileManager.getFile(id);
                },
                setFile: function (id, file) {
                    if (self.fileManager.getFile(id)) {
                        self.fileManager.stack[id].file = file;
                    } else {
                        self.fileManager.add(file, id);
                    }
                },
                setProcessed: function (id) {
                    self.fileManager.processed.push(id);
                },
                getProgress: function () {
                    var total = self.fileManager.total(), processed = self.fileManager.processed.length;
                    if (!total) {
                        return 0;
                    }
                    return Math.ceil(processed / total * 100);

                },
                setProgress: function (id, pct) {
                    var f = self.fileManager.getFile(id);
                    if (!isNaN(pct) && f) {
                        f.progress = pct;
                    }
                }
            };
        },
        _setUploadData: function (fd, config) {
            var self = this;
            $.each(config, function (key, value) {
                var param = self.uploadParamNames[key] || key;
                if ($h.isArray(value)) {
                    fd.append(param, value[0], value[1]);
                } else {
                    fd.append(param, value);
                }
            });
        },
        _initResumableUpload: function () {
            var self = this, opts = self.resumableUploadOptions, logs = $h.logMessages;
            if (!self.enableResumableUpload) {
                return;
            }
            if (opts.fallback !== false && typeof opts.fallback !== 'function') {
                opts.fallback = function (s) {
                    s._log(logs.noResumableSupport);
                    s.enableResumableUpload = false;
                };
            }
            if (!$h.hasResumableUploadSupport() && opts.fallback !== false) {
                opts.fallback(self);
                return;
            }
            if (!self.uploadUrl && self.enableResumableUpload) {
                self._log(logs.noUploadUrl);
                self.enableResumableUpload = false;
                return;

            }
            opts.chunkSize = parseFloat(opts.chunkSize);
            if (opts.chunkSize <= 0 || isNaN(opts.chunkSize)) {
                self._log(logs.invalidChunkSize, {chunkSize: opts.chunkSize});
                self.enableResumableUpload = false;
                return;
            }
            self.resumableManager = {
                init: function (id, f, index) {
                    var rm = self.resumableManager, fm = self.fileManager;
                    rm.currThreads = 0;
                    rm.logs = [];
                    rm.stack = [];
                    rm.error = '';
                    rm.chunkIntervalId = null;
                    rm.id = id;
                    rm.file = f.file;
                    rm.fileName = f.name;
                    rm.fileIndex = index;
                    rm.completed = false;
                    rm.testing = false;
                    rm.lastProgress = 0;
                    if (self.showPreview) {
                        rm.$thumb = fm.getThumb(id) || null;
                        rm.$progress = rm.$btnDelete = null;
                        if (rm.$thumb && rm.$thumb.length) {
                            rm.$progress = rm.$thumb.find('.file-thumb-progress');
                            rm.$btnDelete = rm.$thumb.find('.kv-file-remove');
                        }
                    }
                    rm.chunkSize = self.resumableUploadOptions.chunkSize * 1024;
                    rm.chunkCount = rm.getTotalChunks();
                },
                logAjaxError: function (jqXHR, textStatus, errorThrown) {
                    if (self.resumableUploadOptions.showErrorLog) {
                        self._log(logs.ajaxError, {
                            status: jqXHR.status,
                            error: errorThrown,
                            text: jqXHR.responseText || ''
                        });
                    }
                },
                reset: function () {
                    var rm = self.resumableManager;
                    rm.processed = {};
                },
                setProcessed: function (status) {
                    var rm = self.resumableManager, fm = self.fileManager, id = rm.id, msg,
                        $thumb = rm.$thumb, $prog = rm.$progress, hasThumb = $thumb && $thumb.length,
                        params = {id: hasThumb ? $thumb.attr('id') : '', index: fm.getIndex(id), fileId: id};
                    rm.completed = true;
                    rm.lastProgress = 0;
                    fm.uploadedSize += rm.file.size;
                    if (hasThumb) {
                        $thumb.removeClass('file-uploading');
                    }
                    if (status === 'success') {
                        if (self.showPreview) {
                            self._setProgress(101, $prog);
                            self._setThumbStatus($thumb, 'Success');
                            self._initUploadSuccess(rm.processed[id].data, $thumb);
                        }
                        self.fileManager.removeFile(id);
                        delete rm.processed[id];
                        self._raise('fileuploaded', [params.id, params.index, params.fileId]);
                        if (fm.isProcessed()) {
                            self._setProgress(101);
                        }
                    } else {
                        if (self.showPreview) {
                            self._setThumbStatus($thumb, 'Error');
                            self._setPreviewError($thumb, true);
                            self._setProgress(101, $prog, self.msgProgressError);
                            self._setProgress(101, self.$progress, self.msgProgressError);
                            self.cancelling = true;
                        }
                        if (!self.$errorContainer.find('li[data-file-id="' + params.fileId + '"]').length) {
                            msg = self.msgResumableUploadRetriesExceeded.setTokens({
                                file: rm.fileName,
                                max: self.resumableUploadOptions.maxRetries,
                                error: rm.error
                            });
                            self._showFileError(msg, params);
                        }
                    }
                    if (fm.isProcessed()) {
                        rm.reset();
                    }
                },
                check: function () {
                    var rm = self.resumableManager, status = true;
                    $.each(rm.logs, function (index, value) {
                        if (!value) {
                            status = false;
                            return false;
                        }
                    });
                    if (status) {
                        clearInterval(rm.chunkIntervalId);
                        rm.setProcessed('success');
                    }
                },
                processedResumables: function () {
                    var logs = self.resumableManager.logs, i, count = 0;
                    if (!logs || !logs.length) {
                        return 0;
                    }
                    for (i = 0; i < logs.length; i++) {
                        if (logs[i] === true) {
                            count++;
                        }
                    }
                    return count;
                },
                getUploadedSize: function () {
                    var rm = self.resumableManager, size = rm.processedResumables() * rm.chunkSize;
                    return size > rm.file.size ? rm.file.size : size;
                },
                getTotalChunks: function () {
                    var rm = self.resumableManager, chunkSize = parseFloat(rm.chunkSize);
                    if (!isNaN(chunkSize) && chunkSize > 0) {
                        return Math.ceil(rm.file.size / chunkSize);
                    }
                    return 0;
                },
                getProgress: function () {
                    var rm = self.resumableManager, processed = rm.processedResumables(), total = rm.chunkCount;
                    if (total === 0) {
                        return 0;
                    }
                    return Math.ceil(processed / total * 100);
                },
                checkAborted: function (intervalId) {
                    if (self.paused || self.cancelling) {
                        clearInterval(intervalId);
                        self.unlock();
                    }
                },
                upload: function () {
                    var rm = self.resumableManager, fm = self.fileManager, ids = fm.getIdList(), flag = 'new',
                        intervalId;
                    intervalId = setInterval(function () {
                        var id;
                        rm.checkAborted(intervalId);
                        if (flag === 'new') {
                            self.lock();
                            flag = 'processing';
                            id = ids.shift();
                            fm.initStats(id);
                            if (fm.stack[id]) {
                                rm.init(id, fm.stack[id], fm.getIndex(id));
                                rm.testUpload();
                                rm.uploadResumable();
                            }
                        }
                        if (!fm.isPending(id) && rm.completed) {
                            flag = 'new';
                        }
                        if (fm.isProcessed()) {
                            var $initThumbs = self.$preview.find('.file-preview-initial');
                            if ($initThumbs.length) {
                                $h.addCss($initThumbs, $h.SORT_CSS);
                                self._initSortable();
                            }
                            clearInterval(intervalId);
                            self._clearFileInput();
                            self.unlock();
                            setTimeout(function () {
                                var data = self.previewCache.data;
                                if (data) {
                                    self.initialPreview = data.content;
                                    self.initialPreviewConfig = data.config;
                                    self.initialPreviewThumbTags = data.tags;
                                }
                                self._raise('filebatchuploadcomplete', [
                                    self.initialPreview,
                                    self.initialPreviewConfig,
                                    self.initialPreviewThumbTags,
                                    self._getExtraData()
                                ]);
                            }, self.processDelay);
                        }
                    }, self.processDelay);
                },
                uploadResumable: function () {
                    var i, rm = self.resumableManager, total = rm.chunkCount;
                    for (i = 0; i < total; i++) {
                        rm.logs[i] = !!(rm.processed[rm.id] && rm.processed[rm.id][i]);
                    }
                    for (i = 0; i < total; i++) {
                        rm.pushAjax(i, 0);
                    }
                    rm.chunkIntervalId = setInterval(rm.loopAjax, self.queueDelay);
                },
                testUpload: function () {
                    var rm = self.resumableManager, opts = self.resumableUploadOptions, fd, f,
                        fm = self.fileManager, id = rm.id, fnBefore, fnSuccess, fnError, fnComplete, outData;
                    if (!opts.testUrl) {
                        rm.testing = false;
                        return;
                    }
                    rm.testing = true;
                    fd = new FormData();
                    f = fm.stack[id];
                    self._setUploadData(fd, {
                        fileId: id,
                        fileName: f.fileName,
                        fileSize: f.size,
                        fileRelativePath: f.relativePath,
                        chunkSize: rm.chunkSize,
                        chunkCount: rm.chunkCount
                    });
                    fnBefore = function (jqXHR) {
                        outData = self._getOutData(fd, jqXHR);
                        self._raise('filetestbeforesend', [id, fm, rm, outData]);
                    };
                    fnSuccess = function (data, textStatus, jqXHR) {
                        outData = self._getOutData(fd, jqXHR, data);
                        var pNames = self.uploadParamNames, chunksUploaded = pNames.chunksUploaded || 'chunksUploaded',
                            params = [id, fm, rm, outData];
                        if (!data[chunksUploaded] || !$h.isArray(data[chunksUploaded])) {
                            self._raise('filetesterror', params);
                        } else {
                            if (!rm.processed[id]) {
                                rm.processed[id] = {};
                            }
                            $.each(data[chunksUploaded], function (key, index) {
                                rm.logs[index] = true;
                                rm.processed[id][index] = true;
                            });
                            rm.processed[id].data = data;
                            self._raise('filetestsuccess', params);
                        }
                        rm.testing = false;
                    };
                    fnError = function (jqXHR, textStatus, errorThrown) {
                        outData = self._getOutData(fd, jqXHR);
                        self._raise('filetestajaxerror', [id, fm, rm, outData]);
                        rm.logAjaxError(jqXHR, textStatus, errorThrown);
                        rm.testing = false;
                    };
                    fnComplete = function () {
                        self._raise('filetestcomplete', [id, fm, rm, self._getOutData(fd)]);
                        rm.testing = false;
                    };
                    self._ajaxSubmit(fnBefore, fnSuccess, fnComplete, fnError, fd, id, rm.fileIndex, opts.testUrl);
                },
                pushAjax: function (index, retry) {
                    self.resumableManager.stack.push([index, retry]);
                },
                sendAjax: function (index, retry) {
                    var fm = self.fileManager, rm = self.resumableManager, opts = self.resumableUploadOptions, f,
                        chunkSize = rm.chunkSize, id = rm.id, file = rm.file, $thumb = rm.$thumb,
                        $btnDelete = rm.$btnDelete;
                    if (rm.processed[id] && rm.processed[id][index]) {
                        return;
                    }
                    rm.currThreads++;
                    if (retry > opts.maxRetries) {
                        rm.setProcessed('error');
                        return;
                    }
                    var fd, outData, fnBefore, fnSuccess, fnError, fnComplete, slice = file.slice ? 'slice' :
                        (file.mozSlice ? 'mozSlice' : (file.webkitSlice ? 'webkitSlice' : 'slice')),
                        blob = file[slice](chunkSize * index, chunkSize * (index + 1));
                    fd = new FormData();
                    f = fm.stack[id];
                    self._setUploadData(fd, {
                        chunkCount: rm.chunkCount,
                        chunkIndex: index,
                        chunkSize: chunkSize,
                        chunkSizeStart: chunkSize * index,
                        fileBlob: [blob, rm.fileName],
                        fileId: id,
                        fileName: rm.fileName,
                        fileRelativePath: f.relativePath,
                        fileSize: file.size,
                        retryCount: retry
                    });
                    if (rm.$progress && rm.$progress.length) {
                        rm.$progress.show();
                    }
                    fnBefore = function (jqXHR) {
                        outData = self._getOutData(fd, jqXHR);
                        if (self.showPreview) {
                            if (!$thumb.hasClass('file-preview-success')) {
                                self._setThumbStatus($thumb, 'Loading');
                                $h.addCss($thumb, 'file-uploading');
                            }
                            $btnDelete.attr('disabled', true);
                        }
                        self._raise('filechunkbeforesend', [id, index, retry, fm, rm, outData]);
                    };
                    fnSuccess = function (data, textStatus, jqXHR) {
                        outData = self._getOutData(fd, jqXHR, data);
                        var paramNames = self.uploadParamNames, chunkIndex = paramNames.chunkIndex || 'chunkIndex',
                            opts = self.resumableUploadOptions, params = [id, index, retry, fm, rm, outData];
                        rm.currThreads--;
                        if (data.error) {
                            if (opts.showErrorLog) {
                                self._log(logs.retryStatus, {
                                    retry: retry + 1,
                                    filename: rm.fileName,
                                    chunk: index
                                });
                            }
                            rm.pushAjax(index, retry + 1);
                            rm.error = data.error;
                            self._raise('filechunkerror', params);
                        } else {
                            rm.logs[data[chunkIndex]] = true;
                            if (!rm.processed[id]) {
                                rm.processed[id] = {};
                            }
                            rm.processed[id][data[chunkIndex]] = true;
                            rm.processed[id].data = data;
                            self._raise('filechunksuccess', params);
                            rm.check();
                        }
                    };
                    fnError = function (jqXHR, textStatus, errorThrown) {
                        outData = self._getOutData(fd, jqXHR);
                        rm.currThreads--;
                        rm.error = errorThrown;
                        rm.logAjaxError(jqXHR, textStatus, errorThrown);
                        self._raise('filechunkajaxerror', [id, index, retry, fm, rm, outData]);
                        rm.pushAjax(index, retry + 1);
                    };
                    fnComplete = function () {
                        self._raise('filechunkcomplete', [id, index, retry, fm, rm, self._getOutData(fd)]);
                    };
                    self._ajaxSubmit(fnBefore, fnSuccess, fnComplete, fnError, fd, id, rm.fileIndex);
                },
                loopAjax: function () {
                    var rm = self.resumableManager;
                    if (rm.currThreads < self.resumableUploadOptions.maxThreads && !rm.testing) {
                        var arr = rm.stack.shift(), index;
                        if (typeof arr !== 'undefined') {
                            index = arr[0];
                            if (!rm.processed[rm.id] || !rm.processed[rm.id][index]) {
                                rm.sendAjax(index, arr[1]);
                            } else {
                                if (rm.processedResumables() >= rm.getTotalChunks()) {
                                    rm.setProcessed('success');
                                    clearInterval(rm.chunkIntervalId);
                                }
                            }
                        }
                    }
                }
            };
            self.resumableManager.reset();
        },
        _initTemplateDefaults: function () {
            var self = this, tMain1, tMain2, tPreview, tFileIcon, tClose, tCaption, tBtnDefault, tBtnLink, tBtnBrowse,
                tModalMain, tModal, tProgress, tSize, tFooter, tActions, tActionDelete, tActionUpload, tActionDownload,
                tActionZoom, tActionDrag, tIndicator, tTagBef, tTagBef1, tTagBef2, tTagAft, tGeneric, tHtml, tImage,
                tText, tOffice, tGdocs, tVideo, tAudio, tFlash, tObject, tPdf, tOther, tStyle, tZoomCache, vDefaultDim,
                tStats;
            tMain1 = '{preview}\n' +
                '<div class="kv-upload-progress kv-hidden"></div><div class="clearfix"></div>\n' +
                '<div class="input-group {class}">\n' +
                '  {caption}\n' +
                '<div class="input-group-btn input-group-append">\n' +
                '      {remove}\n' +
                '      {cancel}\n' +
                '      {pause}\n' +
                '      {upload}\n' +
                '      {browse}\n' +
                '    </div>\n' +
                '</div>';
            tMain2 = '{preview}\n<div class="kv-upload-progress kv-hidden"></div>\n<div class="clearfix"></div>\n' +
                '{remove}\n{cancel}\n{upload}\n{browse}\n';
            tPreview = '<div class="file-preview {class}">\n' +
                '  {close}' +
                '  <div class="{dropClass} clearfix">\n' +
                '    <div class="file-preview-thumbnails clearfix">\n' +
                '    </div>\n' +
                '    <div class="file-preview-status text-center text-success"></div>\n' +
                '    <div class="kv-fileinput-error"></div>\n' +
                '  </div>\n' +
                '</div>';
            tClose = $h.closeButton('fileinput-remove');
            tFileIcon = '<i class="glyphicon glyphicon-file"></i>';
            // noinspection HtmlUnknownAttribute
            tCaption = '<div class="file-caption form-control {class}" tabindex="500">\n' +
                '  <span class="file-caption-icon"></span>\n' +
                '  <input class="file-caption-name" onkeydown="return false;" onpaste="return false;">\n' +
                '</div>';
            //noinspection HtmlUnknownAttribute
            tBtnDefault = '<button type="{type}" tabindex="500" title="{title}" class="{css}" ' +
                '{status}>{icon} {label}</button>';
            //noinspection HtmlUnknownTarget,HtmlUnknownAttribute
            tBtnLink = '<a href="{href}" tabindex="500" title="{title}" class="{css}" {status}>{icon} {label}</a>';
            //noinspection HtmlUnknownAttribute
            tBtnBrowse = '<div tabindex="500" class="{css}" {status}>{icon} {label}</div>';
            tModalMain = '<div id="' + $h.MODAL_ID + '" class="file-zoom-dialog modal fade" ' +
                'tabindex="-1" aria-labelledby="' + $h.MODAL_ID + 'Label"></div>';
            tModal = '<div class="modal-dialog modal-lg{rtl}" role="document">\n' +
                '  <div class="modal-content">\n' +
                '    <div class="modal-header">\n' +
                '      <h5 class="modal-title">{heading}</h5>\n' +
                '      <span class="kv-zoom-title"></span>\n' +
                '      <div class="kv-zoom-actions">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
                '    </div>\n' +
                '    <div class="modal-body">\n' +
                '      <div class="floating-buttons"></div>\n' +
                '      <div class="kv-zoom-body file-zoom-content {zoomFrameClass}"></div>\n' + '{prev} {next}\n' +
                '    </div>\n' +
                '  </div>\n' +
                '</div>\n';
            tProgress = '<div class="progress">\n' +
                '    <div class="{class}" role="progressbar"' +
                ' aria-valuenow="{percent}" aria-valuemin="0" aria-valuemax="100" style="width:{percent}%;">\n' +
                '        {status}\n' +
                '     </div>\n' +
                '</div>{stats}';
            tStats = '<div class="text-info file-upload-stats">' +
                '<span class="pending-time">{pendingTime}</span> ' +
                '<span class="upload-speed">{uploadSpeed}</span>' +
                '</div>';
            tSize = ' <samp>({sizeText})</samp>';
            tFooter = '<div class="file-thumbnail-footer">\n' +
                '    <div class="file-footer-caption" title="{caption}">\n' +
                '        <div class="file-caption-info">{caption}</div>\n' +
                '        <div class="file-size-info">{size}</div>\n' +
                '    </div>\n' +
                '    {progress}\n{indicator}\n{actions}\n' +
                '</div>';
            tActions = '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {download} {upload} {delete} {zoom} {other}' +
                '    </div>\n' +
                '</div>\n' +
                '{drag}\n' +
                '<div class="clearfix"></div>';
            //noinspection HtmlUnknownAttribute
            tActionDelete = '<button type="button" class="kv-file-remove {removeClass}" ' +
                'title="{removeTitle}" {dataUrl}{dataKey}>{removeIcon}</button>\n';
            tActionUpload = '<button type="button" class="kv-file-upload {uploadClass}" title="{uploadTitle}">' +
                '{uploadIcon}</button>';
            tActionDownload = '<a class="kv-file-download {downloadClass}" title="{downloadTitle}" ' +
                'href="{downloadUrl}" download="{caption}" target="_blank">{downloadIcon}</a>';
            tActionZoom = '<button type="button" class="kv-file-zoom {zoomClass}" ' +
                'title="{zoomTitle}">{zoomIcon}</button>';
            tActionDrag = '<span class="file-drag-handle {dragClass}" title="{dragTitle}">{dragIcon}</span>';
            tIndicator = '<div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>';
            tTagBef = '<div class="file-preview-frame {frameClass}" id="{previewId}" data-fileindex="{fileindex}"' +
                ' data-fileid="{fileid}" data-template="{template}"';
            tTagBef1 = tTagBef + '><div class="kv-file-content">\n';
            tTagBef2 = tTagBef + ' title="{caption}"><div class="kv-file-content">\n';
            tTagAft = '</div>{footer}\n</div>\n';
            tGeneric = '{content}\n';
            tStyle = ' {style}';
            tHtml = '<div class="kv-preview-data file-preview-html" title="{caption}"' + tStyle + '>{data}</div>\n';
            tImage = '<img src="{data}" class="file-preview-image kv-preview-data" title="{title}" ' +
                'alt="{alt}"' + tStyle + '>\n';
            tText = '<textarea class="kv-preview-data file-preview-text" title="{caption}" readonly' + tStyle + '>' +
                '{data}</textarea>\n';
            tOffice = '<iframe class="kv-preview-data file-preview-office" ' +
                'src="https://view.officeapps.live.com/op/embed.aspx?src={data}"' + tStyle + '></iframe>';
            tGdocs = '<iframe class="kv-preview-data file-preview-gdocs" ' +
                'src="https://docs.google.com/gview?url={data}&embedded=true"' + tStyle + '></iframe>';
            tVideo = '<video class="kv-preview-data file-preview-video" controls' + tStyle + '>\n' +
                '<source src="{data}" type="{type}">\n' + $h.DEFAULT_PREVIEW + '\n</video>\n';
            tAudio = '<!--suppress ALL --><audio class="kv-preview-data file-preview-audio" controls' + tStyle + '>\n<source src="{data}" ' +
                'type="{type}">\n' + $h.DEFAULT_PREVIEW + '\n</audio>\n';
            tFlash = '<embed class="kv-preview-data file-preview-flash" src="{data}" type="application/x-shockwave-flash"' + tStyle + '>\n';
            tPdf = '<embed class="kv-preview-data file-preview-pdf" src="{data}" type="application/pdf"' + tStyle + '>\n';
            tObject = '<object class="kv-preview-data file-preview-object file-object {typeCss}" ' +
                'data="{data}" type="{type}"' + tStyle + '>\n' + '<param name="movie" value="{caption}" />\n' +
                $h.OBJECT_PARAMS + ' ' + $h.DEFAULT_PREVIEW + '\n</object>\n';
            tOther = '<div class="kv-preview-data file-preview-other-frame"' + tStyle + '>\n' + $h.DEFAULT_PREVIEW + '\n</div>\n';
            tZoomCache = '<div class="kv-zoom-cache" style="display:none">{zoomContent}</div>';
            vDefaultDim = {width: '100%', height: '100%', 'min-height': '480px'};
            if (self._isPdfRendered()) {
                tPdf = self.pdfRendererTemplate.replace('{renderer}', self._encodeURI(self.pdfRendererUrl));
            }
            self.defaults = {
                layoutTemplates: {
                    main1: tMain1,
                    main2: tMain2,
                    preview: tPreview,
                    close: tClose,
                    fileIcon: tFileIcon,
                    caption: tCaption,
                    modalMain: tModalMain,
                    modal: tModal,
                    progress: tProgress,
                    stats: tStats,
                    size: tSize,
                    footer: tFooter,
                    indicator: tIndicator,
                    actions: tActions,
                    actionDelete: tActionDelete,
                    actionUpload: tActionUpload,
                    actionDownload: tActionDownload,
                    actionZoom: tActionZoom,
                    actionDrag: tActionDrag,
                    btnDefault: tBtnDefault,
                    btnLink: tBtnLink,
                    btnBrowse: tBtnBrowse,
                    zoomCache: tZoomCache
                },
                previewMarkupTags: {
                    tagBefore1: tTagBef1,
                    tagBefore2: tTagBef2,
                    tagAfter: tTagAft
                },
                previewContentTemplates: {
                    generic: tGeneric,
                    html: tHtml,
                    image: tImage,
                    text: tText,
                    office: tOffice,
                    gdocs: tGdocs,
                    video: tVideo,
                    audio: tAudio,
                    flash: tFlash,
                    object: tObject,
                    pdf: tPdf,
                    other: tOther
                },
                allowedPreviewTypes: ['image', 'html', 'text', 'video', 'audio', 'flash', 'pdf', 'object'],
                previewTemplates: {},
                previewSettings: {
                    image: {width: 'auto', height: 'auto', 'max-width': '100%', 'max-height': '100%'},
                    html: {width: '213px', height: '160px'},
                    text: {width: '213px', height: '160px'},
                    office: {width: '213px', height: '160px'},
                    gdocs: {width: '213px', height: '160px'},
                    video: {width: '213px', height: '160px'},
                    audio: {width: '100%', height: '30px'},
                    flash: {width: '213px', height: '160px'},
                    object: {width: '213px', height: '160px'},
                    pdf: {width: '100%', height: '160px'},
                    other: {width: '213px', height: '160px'}
                },
                previewSettingsSmall: {
                    image: {width: 'auto', height: 'auto', 'max-width': '100%', 'max-height': '100%'},
                    html: {width: '100%', height: '160px'},
                    text: {width: '100%', height: '160px'},
                    office: {width: '100%', height: '160px'},
                    gdocs: {width: '100%', height: '160px'},
                    video: {width: '100%', height: 'auto'},
                    audio: {width: '100%', height: '30px'},
                    flash: {width: '100%', height: 'auto'},
                    object: {width: '100%', height: 'auto'},
                    pdf: {width: '100%', height: '160px'},
                    other: {width: '100%', height: '160px'}
                },
                previewZoomSettings: {
                    image: {width: 'auto', height: 'auto', 'max-width': '100%', 'max-height': '100%'},
                    html: vDefaultDim,
                    text: vDefaultDim,
                    office: {width: '100%', height: '100%', 'max-width': '100%', 'min-height': '480px'},
                    gdocs: {width: '100%', height: '100%', 'max-width': '100%', 'min-height': '480px'},
                    video: {width: 'auto', height: '100%', 'max-width': '100%'},
                    audio: {width: '100%', height: '30px'},
                    flash: {width: 'auto', height: '480px'},
                    object: {width: 'auto', height: '100%', 'max-width': '100%', 'min-height': '480px'},
                    pdf: vDefaultDim,
                    other: {width: 'auto', height: '100%', 'min-height': '480px'}
                },
                mimeTypeAliases: {
                    'video/quicktime': 'video/mp4'
                },
                fileTypeSettings: {
                    image: function (vType, vName) {
                        return ($h.compare(vType, 'image.*') && !$h.compare(vType, /(tiff?|wmf)$/i) ||
                            $h.compare(vName, /\.(gif|png|jpe?g)$/i));
                    },
                    html: function (vType, vName) {
                        return $h.compare(vType, 'text/html') || $h.compare(vName, /\.(htm|html)$/i);
                    },
                    office: function (vType, vName) {
                        return $h.compare(vType, /(word|excel|powerpoint|office)$/i) ||
                            $h.compare(vName, /\.(docx?|xlsx?|pptx?|pps|potx?)$/i);
                    },
                    gdocs: function (vType, vName) {
                        return $h.compare(vType, /(word|excel|powerpoint|office|iwork-pages|tiff?)$/i) ||
                            $h.compare(vName,
                                /\.(docx?|xlsx?|pptx?|pps|potx?|rtf|ods|odt|pages|ai|dxf|ttf|tiff?|wmf|e?ps)$/i);
                    },
                    text: function (vType, vName) {
                        return $h.compare(vType, 'text.*') || $h.compare(vName, /\.(xml|javascript)$/i) ||
                            $h.compare(vName, /\.(txt|md|csv|nfo|ini|json|php|js|css)$/i);
                    },
                    video: function (vType, vName) {
                        return $h.compare(vType, 'video.*') && ($h.compare(vType, /(ogg|mp4|mp?g|mov|webm|3gp)$/i) ||
                            $h.compare(vName, /\.(og?|mp4|webm|mp?g|mov|3gp)$/i));
                    },
                    audio: function (vType, vName) {
                        return $h.compare(vType, 'audio.*') && ($h.compare(vName, /(ogg|mp3|mp?g|wav)$/i) ||
                            $h.compare(vName, /\.(og?|mp3|mp?g|wav)$/i));
                    },
                    flash: function (vType, vName) {
                        return $h.compare(vType, 'application/x-shockwave-flash', true) || $h.compare(vName,
                            /\.(swf)$/i);
                    },
                    pdf: function (vType, vName) {
                        return $h.compare(vType, 'application/pdf', true) || $h.compare(vName, /\.(pdf)$/i);
                    },
                    object: function () {
                        return true;
                    },
                    other: function () {
                        return true;
                    }
                },
                fileActionSettings: {
                    showRemove: true,
                    showUpload: true,
                    showDownload: true,
                    showZoom: true,
                    showDrag: true,
                    removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
                    removeClass: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
                    removeErrorClass: 'btn btn-sm btn-kv btn-danger',
                    removeTitle: 'Remove file',
                    uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
                    uploadClass: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
                    uploadTitle: 'Upload file',
                    uploadRetryIcon: '<i class="glyphicon glyphicon-repeat"></i>',
                    uploadRetryTitle: 'Retry upload',
                    downloadIcon: '<i class="glyphicon glyphicon-download"></i>',
                    downloadClass: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
                    downloadTitle: 'Download file',
                    zoomIcon: '<i class="glyphicon glyphicon-zoom-in"></i>',
                    zoomClass: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
                    zoomTitle: 'View Details',
                    dragIcon: '<i class="glyphicon glyphicon-move"></i>',
                    dragClass: 'text-info',
                    dragTitle: 'Move / Rearrange',
                    dragSettings: {},
                    indicatorNew: '<i class="glyphicon glyphicon-plus-sign text-warning"></i>',
                    indicatorSuccess: '<i class="glyphicon glyphicon-ok-sign text-success"></i>',
                    indicatorError: '<i class="glyphicon glyphicon-exclamation-sign text-danger"></i>',
                    indicatorLoading: '<i class="glyphicon glyphicon-hourglass text-muted"></i>',
                    indicatorPaused: '<i class="glyphicon glyphicon-pause text-primary"></i>',
                    indicatorNewTitle: 'Not uploaded yet',
                    indicatorSuccessTitle: 'Uploaded',
                    indicatorErrorTitle: 'Upload Error',
                    indicatorLoadingTitle: 'Uploading ...',
                    indicatorPausedTitle: 'Upload Paused'
                }
            };
            $.each(self.defaults, function (key, setting) {
                if (key === 'allowedPreviewTypes') {
                    if (self.allowedPreviewTypes === undefined) {
                        self.allowedPreviewTypes = setting;
                    }
                    return;
                }
                self[key] = $.extend(true, {}, setting, self[key]);
            });
            self._initPreviewTemplates();
        },
        _initPreviewTemplates: function () {
            var self = this, tags = self.previewMarkupTags, tagBef, tagAft = tags.tagAfter;
            $.each(self.previewContentTemplates, function (key, value) {
                if ($h.isEmpty(self.previewTemplates[key])) {
                    tagBef = tags.tagBefore2;
                    if (key === 'generic' || key === 'image' || key === 'html' || key === 'text') {
                        tagBef = tags.tagBefore1;
                    }
                    if (self._isPdfRendered() && key === 'pdf') {
                        tagBef = tagBef.replace('kv-file-content', 'kv-file-content kv-pdf-rendered');
                    }
                    self.previewTemplates[key] = tagBef + value + tagAft;
                }
            });
        },
        _initPreviewCache: function () {
            var self = this;
            self.previewCache = {
                data: {},
                init: function () {
                    var content = self.initialPreview;
                    if (content.length > 0 && !$h.isArray(content)) {
                        content = content.split(self.initialPreviewDelimiter);
                    }
                    self.previewCache.data = {
                        content: content,
                        config: self.initialPreviewConfig,
                        tags: self.initialPreviewThumbTags
                    };
                },
                count: function (skipNull) {
                    if (!self.previewCache.data || !self.previewCache.data.content) {
                        return 0;
                    }
                    if (skipNull) {
                        var chk = self.previewCache.data.content.filter(function (n) {
                            return n !== null;
                        });
                        return chk.length;
                    }
                    return self.previewCache.data.content.length;
                },
                get: function (i, isDisabled) {
                    var ind = $h.INIT_FLAG + i, data = self.previewCache.data, config = data.config[i],
                        content = data.content[i], out, $tmp, cat, ftr,
                        fname, ftype, frameClass, asData = $h.ifSet('previewAsData', config, self.initialPreviewAsData),
                        a = config ? {title: config.title || null, alt: config.alt || null} : {title: null, alt: null},
                        parseTemplate = function (cat, dat, fname, ftype, ftr, ind, fclass, t) {
                            var fc = ' file-preview-initial ' + $h.SORT_CSS + (fclass ? ' ' + fclass : ''),
                                id = self.previewInitId + '-' + ind,
                                fileId = config && config.fileId || id;
                            /** @namespace config.zoomData */
                            return self._generatePreviewTemplate(cat, dat, fname, ftype, id, fileId, false, null, fc,
                                ftr, ind, t, a, config && config.zoomData || dat);
                        };
                    if (!content || !content.length) {
                        return '';
                    }
                    isDisabled = isDisabled === undefined ? true : isDisabled;
                    cat = $h.ifSet('type', config, self.initialPreviewFileType || 'generic');
                    fname = $h.ifSet('filename', config, $h.ifSet('caption', config));
                    ftype = $h.ifSet('filetype', config, cat);
                    ftr = self.previewCache.footer(i, isDisabled, (config && config.size || null));
                    frameClass = $h.ifSet('frameClass', config);
                    if (asData) {
                        out = parseTemplate(cat, content, fname, ftype, ftr, ind, frameClass);
                    } else {
                        out = parseTemplate('generic', content, fname, ftype, ftr, ind, frameClass, cat)
                            .setTokens({'content': data.content[i]});
                    }
                    if (data.tags.length && data.tags[i]) {
                        out = $h.replaceTags(out, data.tags[i]);
                    }
                    /** @namespace config.frameAttr */
                    if (!$h.isEmpty(config) && !$h.isEmpty(config.frameAttr)) {
                        $tmp = $(document.createElement('div')).html(out);
                        $tmp.find('.file-preview-initial').attr(config.frameAttr);
                        out = $tmp.html();
                        $tmp.remove();
                    }
                    return out;
                },
                clean: function (data) {
                    data.content = $h.cleanArray(data.content);
                    data.config = $h.cleanArray(data.config);
                    data.tags = $h.cleanArray(data.tags);
                    self.previewCache.data = data;
                },
                add: function (content, config, tags, append) {
                    var data = self.previewCache.data, index;
                    if (!content || !content.length) {
                        return 0;
                    }
                    index = content.length - 1;
                    if (!$h.isArray(content)) {
                        content = content.split(self.initialPreviewDelimiter);
                    }
                    if (append) {
                        index = data.content.push(content[0]) - 1;
                        data.config[index] = config;
                        data.tags[index] = tags;
                    } else {
                        data.content = content;
                        data.config = config;
                        data.tags = tags;
                    }
                    self.previewCache.clean(data);
                    return index;
                },
                set: function (content, config, tags, append) {
                    var data = self.previewCache.data, i, chk;
                    if (!content || !content.length) {
                        return;
                    }
                    if (!$h.isArray(content)) {
                        content = content.split(self.initialPreviewDelimiter);
                    }
                    chk = content.filter(function (n) {
                        return n !== null;
                    });
                    if (!chk.length) {
                        return;
                    }
                    if (data.content === undefined) {
                        data.content = [];
                    }
                    if (data.config === undefined) {
                        data.config = [];
                    }
                    if (data.tags === undefined) {
                        data.tags = [];
                    }
                    if (append) {
                        for (i = 0; i < content.length; i++) {
                            if (content[i]) {
                                data.content.push(content[i]);
                            }
                        }
                        for (i = 0; i < config.length; i++) {
                            if (config[i]) {
                                data.config.push(config[i]);
                            }
                        }
                        for (i = 0; i < tags.length; i++) {
                            if (tags[i]) {
                                data.tags.push(tags[i]);
                            }
                        }
                    } else {
                        data.content = content;
                        data.config = config;
                        data.tags = tags;
                    }
                    self.previewCache.clean(data);
                },
                unset: function (index) {
                    var chk = self.previewCache.count(), rev = self.reversePreviewOrder;
                    if (!chk) {
                        return;
                    }
                    if (chk === 1) {
                        self.previewCache.data.content = [];
                        self.previewCache.data.config = [];
                        self.previewCache.data.tags = [];
                        self.initialPreview = [];
                        self.initialPreviewConfig = [];
                        self.initialPreviewThumbTags = [];
                        return;
                    }
                    self.previewCache.data.content = $h.spliceArray(self.previewCache.data.content, index, rev);
                    self.previewCache.data.config = $h.spliceArray(self.previewCache.data.config, index, rev);
                    self.previewCache.data.tags = $h.spliceArray(self.previewCache.data.tags, index, rev);
                    var data = $.extend(true, {}, self.previewCache.data);
                    self.previewCache.clean(data);
                },
                out: function () {
                    var html = '', caption, len = self.previewCache.count(), i, content;
                    if (len === 0) {
                        return {content: '', caption: ''};
                    }
                    for (i = 0; i < len; i++) {
                        content = self.previewCache.get(i);
                        html = self.reversePreviewOrder ? (content + html) : (html + content);
                    }
                    caption = self._getMsgSelected(len);
                    return {content: html, caption: caption};
                },
                footer: function (i, isDisabled, size) {
                    var data = self.previewCache.data || {};
                    if ($h.isEmpty(data.content)) {
                        return '';
                    }
                    if ($h.isEmpty(data.config) || $h.isEmpty(data.config[i])) {
                        data.config[i] = {};
                    }
                    isDisabled = isDisabled === undefined ? true : isDisabled;
                    var config = data.config[i], caption = $h.ifSet('caption', config), a,
                        width = $h.ifSet('width', config, 'auto'), url = $h.ifSet('url', config, false),
                        key = $h.ifSet('key', config, null), fileId = $h.ifSet('fileId', config, null),
                        fs = self.fileActionSettings, initPreviewShowDel = self.initialPreviewShowDelete || false,
                        downloadInitialUrl = !self.initialPreviewDownloadUrl ? '' :
                            self.initialPreviewDownloadUrl + '?key=' + key + (fileId ? '&fileId=' + fileId : ''),
                        dUrl = config.downloadUrl || downloadInitialUrl,
                        dFil = config.filename || config.caption || '',
                        initPreviewShowDwl = !!(dUrl),
                        sDel = $h.ifSet('showRemove', config, $h.ifSet('showRemove', fs, initPreviewShowDel)),
                        sDwl = $h.ifSet('showDownload', config, $h.ifSet('showDownload', fs, initPreviewShowDwl)),
                        sZm = $h.ifSet('showZoom', config, $h.ifSet('showZoom', fs, true)),
                        sDrg = $h.ifSet('showDrag', config, $h.ifSet('showDrag', fs, true)),
                        dis = (url === false) && isDisabled;
                    sDwl = sDwl && config.downloadUrl !== false && !!dUrl;
                    a = self._renderFileActions(config, false, sDwl, sDel, sZm, sDrg, dis, url, key, true, dUrl, dFil);
                    return self._getLayoutTemplate('footer').setTokens({
                        'progress': self._renderThumbProgress(),
                        'actions': a,
                        'caption': caption,
                        'size': self._getSize(size),
                        'width': width,
                        'indicator': ''
                    });
                }
            };
            self.previewCache.init();
        },
        _isPdfRendered: function () {
            var self = this, useLib = self.usePdfRenderer,
                flag = typeof useLib === 'function' ? useLib() : !!useLib;
            return flag && self.pdfRendererUrl;
        },
        _handler: function ($el, event, callback) {
            var self = this, ns = self.namespace, ev = event.split(' ').join(ns + ' ') + ns;
            if (!$el || !$el.length) {
                return;
            }
            $el.off(ev).on(ev, callback);
        },
        _encodeURI: function (vUrl) {
            var self = this;
            return self.encodeUrl ? encodeURI(vUrl) : vUrl;
        },
        _log: function (msg, tokens) {
            var self = this, id = self.$element.attr('id');
            if (!self.showConsoleLogs) {
                return;
            }
            if (id) {
                msg = '"' + id + '": ' + msg;
            }
            msg = 'bootstrap-fileinput: ' + msg;
            if (typeof tokens === 'object') {
                msg = msg.setTokens(tokens);
            }
            if (window.console && typeof window.console.log !== 'undefined') {
                window.console.log(msg);
            } else {
                window.alert(msg);
            }
        },
        _validate: function () {
            var self = this, status = self.$element.attr('type') === 'file';
            if (!status) {
                self._log($h.logMessages.badInputType);
            }
            return status;
        },
        _errorsExist: function () {
            var self = this, $err, $errList = self.$errorContainer.find('li');
            if ($errList.length) {
                return true;
            }
            $err = $(document.createElement('div')).html(self.$errorContainer.html());
            $err.find('.kv-error-close').remove();
            $err.find('ul').remove();
            return !!$.trim($err.text()).length;
        },
        _errorHandler: function (evt, caption) {
            var self = this, err = evt.target.error, showError = function (msg) {
                self._showError(msg.replace('{name}', caption));
            };
            /** @namespace err.NOT_FOUND_ERR */
            /** @namespace err.SECURITY_ERR */
            /** @namespace err.NOT_READABLE_ERR */
            if (err.code === err.NOT_FOUND_ERR) {
                showError(self.msgFileNotFound);
            } else {
                if (err.code === err.SECURITY_ERR) {
                    showError(self.msgFileSecured);
                } else {
                    if (err.code === err.NOT_READABLE_ERR) {
                        showError(self.msgFileNotReadable);
                    } else {
                        if (err.code === err.ABORT_ERR) {
                            showError(self.msgFilePreviewAborted);
                        } else {
                            showError(self.msgFilePreviewError);
                        }
                    }
                }
            }
        },
        _addError: function (msg) {
            var self = this, $error = self.$errorContainer;
            if (msg && $error.length) {
                $error.html(self.errorCloseButton + msg);
                self._handler($error.find('.kv-error-close'), 'click', function () {
                    setTimeout(function () {
                        if (self.showPreview && !self.getFrames().length) {
                            self.clear();
                        }
                        $error.fadeOut('slow');
                    }, self.processDelay);
                });
            }
        },
        _setValidationError: function (css) {
            var self = this;
            css = (css ? css + ' ' : '') + 'has-error';
            self.$container.removeClass(css).addClass('has-error');
            $h.addCss(self.$captionContainer, 'is-invalid');
        },
        _resetErrors: function (fade) {
            var self = this, $error = self.$errorContainer;
            self.isError = false;
            self.$container.removeClass('has-error');
            self.$captionContainer.removeClass('is-invalid');
            $error.html('');
            if (fade) {
                $error.fadeOut('slow');
            } else {
                $error.hide();
            }
        },
        _showFolderError: function (folders) {
            var self = this, $error = self.$errorContainer, msg;
            if (!folders) {
                return;
            }
            if (!self.isAjaxUpload) {
                self._clearFileInput();
            }
            msg = self.msgFoldersNotAllowed.replace('{n}', folders);
            self._addError(msg);
            self._setValidationError();
            $error.fadeIn(800);
            self._raise('filefoldererror', [folders, msg]);
        },
        _showFileError: function (msg, params, event) {
            var self = this, $error = self.$errorContainer, ev = event || 'fileuploaderror',
                fId = params && params.fileId || '', e = params && params.id ?
                '<li data-thumb-id="' + params.id + '" data-file-id="' + fId + '">' + msg + '</li>' : '<li>' + msg + '</li>';
            if ($error.find('ul').length === 0) {
                self._addError('<ul>' + e + '</ul>');
            } else {
                $error.find('ul').append(e);
            }
            $error.fadeIn(800);
            self._raise(ev, [params, msg]);
            self._setValidationError('file-input-new');
            return true;
        },
        _showError: function (msg, params, event) {
            var self = this, $error = self.$errorContainer, ev = event || 'fileerror';
            params = params || {};
            params.reader = self.reader;
            self._addError(msg);
            $error.fadeIn(800);
            self._raise(ev, [params, msg]);
            if (!self.isAjaxUpload) {
                self._clearFileInput();
            }
            self._setValidationError('file-input-new');
            self.$btnUpload.attr('disabled', true);
            return true;
        },
        _noFilesError: function (params) {
            var self = this, label = self.minFileCount > 1 ? self.filePlural : self.fileSingle,
                msg = self.msgFilesTooLess.replace('{n}', self.minFileCount).replace('{files}', label),
                $error = self.$errorContainer;
            self._addError(msg);
            self.isError = true;
            self._updateFileDetails(0);
            $error.fadeIn(800);
            self._raise('fileerror', [params, msg]);
            self._clearFileInput();
            self._setValidationError();
        },
        _parseError: function (operation, jqXHR, errorThrown, fileName) {
            /** @namespace jqXHR.responseJSON */
            var self = this, errMsg = $.trim(errorThrown + ''), textPre,
                text = jqXHR.responseJSON !== undefined && jqXHR.responseJSON.error !== undefined ?
                    jqXHR.responseJSON.error : jqXHR.responseText;
            if (self.cancelling && self.msgUploadAborted) {
                errMsg = self.msgUploadAborted;
            }
            if (self.showAjaxErrorDetails && text) {
                text = $.trim(text.replace(/\n\s*\n/g, '\n'));
                textPre = text.length ? '<pre>' + text + '</pre>' : '';
                errMsg += errMsg ? textPre : text;
            }
            if (!errMsg) {
                errMsg = self.msgAjaxError.replace('{operation}', operation);
            }
            self.cancelling = false;
            return fileName ? '<b>' + fileName + ': </b>' + errMsg : errMsg;
        },
        _parseFileType: function (type, name) {
            var self = this, isValid, vType, cat, i, types = self.allowedPreviewTypes || [];
            if (type === 'application/text-plain') {
                return 'text';
            }
            for (i = 0; i < types.length; i++) {
                cat = types[i];
                isValid = self.fileTypeSettings[cat];
                vType = isValid(type, name) ? cat : '';
                if (!$h.isEmpty(vType)) {
                    return vType;
                }
            }
            return 'other';
        },
        _getPreviewIcon: function (fname) {
            var self = this, ext, out = null;
            if (fname && fname.indexOf('.') > -1) {
                ext = fname.split('.').pop();
                if (self.previewFileIconSettings) {
                    out = self.previewFileIconSettings[ext] || self.previewFileIconSettings[ext.toLowerCase()] || null;
                }
                if (self.previewFileExtSettings) {
                    $.each(self.previewFileExtSettings, function (key, func) {
                        if (self.previewFileIconSettings[key] && func(ext)) {
                            out = self.previewFileIconSettings[key];
                            //noinspection UnnecessaryReturnStatementJS
                            return;
                        }
                    });
                }
            }
            return out || self.previewFileIcon;
        },
        _parseFilePreviewIcon: function (content, fname) {
            var self = this, icn = self._getPreviewIcon(fname), out = content;
            if (out.indexOf('{previewFileIcon}') > -1) {
                out = out.setTokens({'previewFileIconClass': self.previewFileIconClass, 'previewFileIcon': icn});
            }
            return out;
        },
        _raise: function (event, params) {
            var self = this, e = $.Event(event);
            if (params !== undefined) {
                self.$element.trigger(e, params);
            } else {
                self.$element.trigger(e);
            }
            if (e.isDefaultPrevented() || e.result === false) {
                return false;
            }
            switch (event) {
                // ignore these events
                case 'filebatchuploadcomplete':
                case 'filebatchuploadsuccess':
                case 'fileuploaded':
                case 'fileclear':
                case 'filecleared':
                case 'filereset':
                case 'fileerror':
                case 'filefoldererror':
                case 'fileuploaderror':
                case 'filebatchuploaderror':
                case 'filedeleteerror':
                case 'filecustomerror':
                case 'filesuccessremove':
                    break;
                // receive data response via `filecustomerror` event`
                default:
                    if (!self.ajaxAborted) {
                        self.ajaxAborted = e.result;
                    }
                    break;
            }
            return true;
        },
        _listenFullScreen: function (isFullScreen) {
            var self = this, $modal = self.$modal, $btnFull, $btnBord;
            if (!$modal || !$modal.length) {
                return;
            }
            $btnFull = $modal && $modal.find('.btn-fullscreen');
            $btnBord = $modal && $modal.find('.btn-borderless');
            if (!$btnFull.length || !$btnBord.length) {
                return;
            }
            $btnFull.removeClass('active').attr('aria-pressed', 'false');
            $btnBord.removeClass('active').attr('aria-pressed', 'false');
            if (isFullScreen) {
                $btnFull.addClass('active').attr('aria-pressed', 'true');
            } else {
                $btnBord.addClass('active').attr('aria-pressed', 'true');
            }
            if ($modal.hasClass('file-zoom-fullscreen')) {
                self._maximizeZoomDialog();
            } else {
                if (isFullScreen) {
                    self._maximizeZoomDialog();
                } else {
                    $btnBord.removeClass('active').attr('aria-pressed', 'false');
                }
            }
        },
        _listen: function () {
            var self = this, $el = self.$element, $form = self.$form, $cont = self.$container, fullScreenEvents;
            self._handler($el, 'click', function (e) {
                if ($el.hasClass('file-no-browse')) {
                    if ($el.data('zoneClicked')) {
                        $el.data('zoneClicked', false);
                    } else {
                        e.preventDefault();
                    }
                }
            });
            self._handler($el, 'change', $.proxy(self._change, self));
            if (self.showBrowse) {
                self._handler(self.$btnFile, 'click', $.proxy(self._browse, self));
            }
            self._handler($cont.find('.fileinput-remove:not([disabled])'), 'click', $.proxy(self.clear, self));
            self._handler($cont.find('.fileinput-cancel'), 'click', $.proxy(self.cancel, self));
            self._handler($cont.find('.fileinput-pause'), 'click', $.proxy(self.pause, self));
            self._initDragDrop();
            self._handler($form, 'reset', $.proxy(self.clear, self));
            if (!self.isAjaxUpload) {
                self._handler($form, 'submit', $.proxy(self._submitForm, self));
            }
            self._handler(self.$container.find('.fileinput-upload'), 'click', $.proxy(self._uploadClick, self));
            self._handler($(window), 'resize', function () {
                self._listenFullScreen(screen.width === window.innerWidth && screen.height === window.innerHeight);
            });
            fullScreenEvents = 'webkitfullscreenchange mozfullscreenchange fullscreenchange MSFullscreenChange';
            self._handler($(document), fullScreenEvents, function () {
                self._listenFullScreen($h.checkFullScreen());
            });
            self._autoFitContent();
            self._initClickable();
            self._refreshPreview();
        },
        _autoFitContent: function () {
            var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
                self = this, config = width < 400 ? (self.previewSettingsSmall || self.defaults.previewSettingsSmall) :
                (self.previewSettings || self.defaults.previewSettings), sel;
            $.each(config, function (cat, settings) {
                sel = '.file-preview-frame .file-preview-' + cat;
                self.$preview.find(sel + '.kv-preview-data,' + sel + ' .kv-preview-data').css(settings);
            });
        },
        _scanDroppedItems: function (item, files, path) {
            path = path || '';
            var self = this, i, dirReader, readDir, errorHandler = function (e) {
                self._log($h.logMessages.badDroppedFiles);
                self._log(e);
            };
            if (item.isFile) {
                item.file(function (file) {
                    files.push(file);
                }, errorHandler);
            } else {
                if (item.isDirectory) {
                    dirReader = item.createReader();
                    readDir = function () {
                        dirReader.readEntries(function (entries) {
                            if (entries && entries.length > 0) {
                                for (i = 0; i < entries.length; i++) {
                                    self._scanDroppedItems(entries[i], files, path + item.name + '/');
                                }
                                // recursively call readDir() again, since browser can only handle first 100 entries.
                                readDir();
                            }
                            return null;
                        }, errorHandler);
                    };
                    readDir();
                }
            }

        },
        _initDragDrop: function () {
            var self = this, $zone = self.$dropZone;
            if (self.dropZoneEnabled && self.showPreview) {
                self._handler($zone, 'dragenter dragover', $.proxy(self._zoneDragEnter, self));
                self._handler($zone, 'dragleave', $.proxy(self._zoneDragLeave, self));
                self._handler($zone, 'drop', $.proxy(self._zoneDrop, self));
                self._handler($(document), 'dragenter dragover drop', self._zoneDragDropInit);
            }
        },
        _zoneDragDropInit: function (e) {
            e.stopPropagation();
            e.preventDefault();
        },
        _zoneDragEnter: function (e) {
            var self = this, dataTransfer = e.originalEvent.dataTransfer,
                hasFiles = $.inArray('Files', dataTransfer.types) > -1;
            self._zoneDragDropInit(e);
            if (self.isDisabled || !hasFiles) {
                e.originalEvent.dataTransfer.effectAllowed = 'none';
                e.originalEvent.dataTransfer.dropEffect = 'none';
                return;
            }
            if (self._raise('fileDragEnter', {'sourceEvent': e, 'files': dataTransfer.types.Files})) {
                $h.addCss(self.$dropZone, 'file-highlighted');
            }
        },
        _zoneDragLeave: function (e) {
            var self = this;
            self._zoneDragDropInit(e);
            if (self.isDisabled) {
                return;
            }
            if (self._raise('fileDragLeave', {'sourceEvent': e})) {
                self.$dropZone.removeClass('file-highlighted');
            }

        },
        _zoneDrop: function (e) {
            /** @namespace e.originalEvent.dataTransfer */
            var self = this, i, $el = self.$element, dataTransfer = e.originalEvent.dataTransfer,
                files = dataTransfer.files, items = dataTransfer.items, folders = $h.getDragDropFolders(items),
                processFiles = function () {
                    if (!self.isAjaxUpload) {
                        self.changeTriggered = true;
                        $el.get(0).files = files;
                        setTimeout(function () {
                            self.changeTriggered = false;
                            $el.trigger('change' + self.namespace);
                        }, self.processDelay);
                    } else {
                        self._change(e, files);
                    }
                    self.$dropZone.removeClass('file-highlighted');
                };
            e.preventDefault();
            if (self.isDisabled || $h.isEmpty(files)) {
                return;
            }
            if (!self._raise('fileDragDrop', {'sourceEvent': e, 'files': files})) {
                return;
            }
            if (folders > 0) {
                if (!self.isAjaxUpload) {
                    self._showFolderError(folders);
                    return;
                }
                files = [];
                for (i = 0; i < items.length; i++) {
                    var item = items[i].webkitGetAsEntry();
                    if (item) {
                        self._scanDroppedItems(item, files);
                    }
                }
                setTimeout(function () {
                    processFiles();
                }, 500);
            } else {
                processFiles();
            }
        },
        _uploadClick: function (e) {
            var self = this, $btn = self.$container.find('.fileinput-upload'), $form,
                isEnabled = !$btn.hasClass('disabled') && $h.isEmpty($btn.attr('disabled'));
            if (e && e.isDefaultPrevented()) {
                return;
            }
            if (!self.isAjaxUpload) {
                if (isEnabled && $btn.attr('type') !== 'submit') {
                    $form = $btn.closest('form');
                    // downgrade to normal form submit if possible
                    if ($form.length) {
                        $form.trigger('submit');
                    }
                    e.preventDefault();
                }
                return;
            }
            e.preventDefault();
            if (isEnabled) {
                self.upload();
            }
        },
        _submitForm: function () {
            var self = this;
            return self._isFileSelectionValid() && !self._abort({});
        },
        _clearPreview: function () {
            var self = this,
                $thumbs = self.showUploadedThumbs ? self.getFrames(':not(.file-preview-success)') : self.getFrames();
            $thumbs.each(function () {
                var $thumb = $(this), id = $thumb.attr('id'), $zoom = self._getZoom(id);
                $thumb.remove();
                $h.cleanZoomCache($zoom);
            });
            if (!self.getFrames().length || !self.showPreview) {
                self._resetUpload();
            }
            self._validateDefaultPreview();
        },
        _initSortable: function () {
            var self = this, $el = self.$preview, settings, selector = '.' + $h.SORT_CSS,
                rev = self.reversePreviewOrder;
            if (!window.KvSortable || $el.find(selector).length === 0) {
                return;
            }
            //noinspection JSUnusedGlobalSymbols
            settings = {
                handle: '.drag-handle-init',
                dataIdAttr: 'data-preview-id',
                scroll: false,
                draggable: selector,
                onSort: function (e) {
                    var oldIndex = e.oldIndex, newIndex = e.newIndex, i = 0;
                    self.initialPreview = $h.moveArray(self.initialPreview, oldIndex, newIndex, rev);
                    self.initialPreviewConfig = $h.moveArray(self.initialPreviewConfig, oldIndex, newIndex, rev);
                    self.previewCache.init();
                    self.getFrames('.file-preview-initial').each(function () {
                        $(this).attr('data-fileindex', $h.INIT_FLAG + i);
                        i++;
                    });
                    self._raise('filesorted', {
                        previewId: $(e.item).attr('id'),
                        'oldIndex': oldIndex,
                        'newIndex': newIndex,
                        stack: self.initialPreviewConfig
                    });
                }
            };
            if ($el.data('kvsortable')) {
                $el.kvsortable('destroy');
            }
            $.extend(true, settings, self.fileActionSettings.dragSettings);
            $el.kvsortable(settings);
        },
        _setPreviewContent: function (content) {
            var self = this;
            self.$preview.html(content);
            self._autoFitContent();
        },
        _initPreviewImageOrientations: function () {
            var self = this, i = 0;
            if (!self.autoOrientImageInitial) {
                return;
            }
            self.getFrames('.file-preview-initial').each(function () {
                var $thumb = $(this), $img, $zoomImg, id, config = self.initialPreviewConfig[i];
                /** @namespace config.exif */
                if (config && config.exif && config.exif.Orientation) {
                    id = $thumb.attr('id');
                    $img = $thumb.find('>.kv-file-content img');
                    $zoomImg = self._getZoom(id, ' >.kv-file-content img');
                    self.setImageOrientation($img, $zoomImg, config.exif.Orientation, $thumb);
                }
                i++;
            });
        },
        _initPreview: function (isInit) {
            var self = this, cap = self.initialCaption || '', out;
            if (!self.previewCache.count(true)) {
                self._clearPreview();
                if (isInit) {
                    self._setCaption(cap);
                } else {
                    self._initCaption();
                }
                return;
            }
            out = self.previewCache.out();
            cap = isInit && self.initialCaption ? self.initialCaption : out.caption;
            self._setPreviewContent(out.content);
            self._setInitThumbAttr();
            self._setCaption(cap);
            self._initSortable();
            if (!$h.isEmpty(out.content)) {
                self.$container.removeClass('file-input-new');
            }
            self._initPreviewImageOrientations();
        },
        _getZoomButton: function (type) {
            var self = this, label = self.previewZoomButtonIcons[type], css = self.previewZoomButtonClasses[type],
                title = ' title="' + (self.previewZoomButtonTitles[type] || '') + '" ',
                params = title + (type === 'close' ? ' data-dismiss="modal" aria-hidden="true"' : '');
            if (type === 'fullscreen' || type === 'borderless' || type === 'toggleheader') {
                params += ' data-toggle="button" aria-pressed="false" autocomplete="off"';
            }
            return '<button type="button" class="' + css + ' btn-' + type + '"' + params + '>' + label + '</button>';
        },
        _getModalContent: function () {
            var self = this;
            return self._getLayoutTemplate('modal').setTokens({
                'rtl': self.rtl ? ' kv-rtl' : '',
                'zoomFrameClass': self.frameClass,
                'heading': self.msgZoomModalHeading,
                'prev': self._getZoomButton('prev'),
                'next': self._getZoomButton('next'),
                'toggleheader': self._getZoomButton('toggleheader'),
                'fullscreen': self._getZoomButton('fullscreen'),
                'borderless': self._getZoomButton('borderless'),
                'close': self._getZoomButton('close')
            });
        },
        _listenModalEvent: function (event) {
            var self = this, $modal = self.$modal, getParams = function (e) {
                return {
                    sourceEvent: e,
                    previewId: $modal.data('previewId'),
                    modal: $modal
                };
            };
            $modal.on(event + '.bs.modal', function (e) {
                var $btnFull = $modal.find('.btn-fullscreen'), $btnBord = $modal.find('.btn-borderless');
                self._raise('filezoom' + event, getParams(e));
                if (event === 'shown') {
                    $btnBord.removeClass('active').attr('aria-pressed', 'false');
                    $btnFull.removeClass('active').attr('aria-pressed', 'false');
                    if ($modal.hasClass('file-zoom-fullscreen')) {
                        self._maximizeZoomDialog();
                        if ($h.checkFullScreen()) {
                            $btnFull.addClass('active').attr('aria-pressed', 'true');
                        } else {
                            $btnBord.addClass('active').attr('aria-pressed', 'true');
                        }
                    }
                }
            });
        },
        _initZoom: function () {
            var self = this, $dialog, modalMain = self._getLayoutTemplate('modalMain'), modalId = '#' + $h.MODAL_ID;
            if (!self.showPreview) {
                return;
            }
            self.$modal = $(modalId);
            if (!self.$modal || !self.$modal.length) {
                $dialog = $(document.createElement('div')).html(modalMain).insertAfter(self.$container);
                self.$modal = $(modalId).insertBefore($dialog);
                $dialog.remove();
            }
            $h.initModal(self.$modal);
            self.$modal.html(self._getModalContent());
            $.each($h.MODAL_EVENTS, function (key, event) {
                self._listenModalEvent(event);
            });
        },
        _initZoomButtons: function () {
            var self = this, previewId = self.$modal.data('previewId') || '', $first, $last,
                thumbs = self.getFrames().toArray(), len = thumbs.length, $prev = self.$modal.find('.btn-prev'),
                $next = self.$modal.find('.btn-next');
            if (thumbs.length < 2) {
                $prev.hide();
                $next.hide();
                return;
            } else {
                $prev.show();
                $next.show();
            }
            if (!len) {
                return;
            }
            $first = $(thumbs[0]);
            $last = $(thumbs[len - 1]);
            $prev.removeAttr('disabled');
            $next.removeAttr('disabled');
            if ($first.length && $first.attr('id') === previewId) {
                $prev.attr('disabled', true);
            }
            if ($last.length && $last.attr('id') === previewId) {
                $next.attr('disabled', true);
            }
        },
        _maximizeZoomDialog: function () {
            var self = this, $modal = self.$modal, $head = $modal.find('.modal-header:visible'),
                $foot = $modal.find('.modal-footer:visible'), $body = $modal.find('.modal-body'),
                h = $(window).height(), diff = 0;
            $modal.addClass('file-zoom-fullscreen');
            if ($head && $head.length) {
                h -= $head.outerHeight(true);
            }
            if ($foot && $foot.length) {
                h -= $foot.outerHeight(true);
            }
            if ($body && $body.length) {
                diff = $body.outerHeight(true) - $body.height();
                h -= diff;
            }
            $modal.find('.kv-zoom-body').height(h);
        },
        _resizeZoomDialog: function (fullScreen) {
            var self = this, $modal = self.$modal, $btnFull = $modal.find('.btn-fullscreen'),
                $btnBord = $modal.find('.btn-borderless');
            if ($modal.hasClass('file-zoom-fullscreen')) {
                $h.toggleFullScreen(false);
                if (!fullScreen) {
                    if (!$btnFull.hasClass('active')) {
                        $modal.removeClass('file-zoom-fullscreen');
                        self.$modal.find('.kv-zoom-body').css('height', self.zoomModalHeight);
                    } else {
                        $btnFull.removeClass('active').attr('aria-pressed', 'false');
                    }
                } else {
                    if (!$btnFull.hasClass('active')) {
                        $modal.removeClass('file-zoom-fullscreen');
                        self._resizeZoomDialog(true);
                        if ($btnBord.hasClass('active')) {
                            $btnBord.removeClass('active').attr('aria-pressed', 'false');
                        }
                    }
                }
            } else {
                if (!fullScreen) {
                    self._maximizeZoomDialog();
                    return;
                }
                $h.toggleFullScreen(true);
            }
            $modal.focus();
        },
        _setZoomContent: function ($frame, animate) {
            var self = this, $content, tmplt, body, title, $body, $dataEl, config, previewId = $frame.attr('id'),
                $zoomPreview = self._getZoom(previewId), $modal = self.$modal, $tmp,
                $btnFull = $modal.find('.btn-fullscreen'), $btnBord = $modal.find('.btn-borderless'), cap, size,
                $btnTogh = $modal.find('.btn-toggleheader');
            tmplt = $zoomPreview.attr('data-template') || 'generic';
            $content = $zoomPreview.find('.kv-file-content');
            body = $content.length ? $content.html() : '';
            cap = $frame.data('caption') || '';
            size = $frame.data('size') || '';
            title = cap + ' ' + size;
            $modal.find('.kv-zoom-title').attr('title', $('<div/>').html(title).text()).html(title);
            $body = $modal.find('.kv-zoom-body');
            $modal.removeClass('kv-single-content');
            if (animate) {
                $tmp = $body.addClass('file-thumb-loading').clone().insertAfter($body);
                $body.html(body).hide();
                $tmp.fadeOut('fast', function () {
                    $body.fadeIn('fast', function () {
                        $body.removeClass('file-thumb-loading');
                    });
                    $tmp.remove();
                });
            } else {
                $body.html(body);
            }
            config = self.previewZoomSettings[tmplt];
            if (config) {
                $dataEl = $body.find('.kv-preview-data');
                $h.addCss($dataEl, 'file-zoom-detail');
                $.each(config, function (key, value) {
                    $dataEl.css(key, value);
                    if (($dataEl.attr('width') && key === 'width') || ($dataEl.attr('height') && key === 'height')) {
                        $dataEl.removeAttr(key);
                    }
                });
            }
            $modal.data('previewId', previewId);
            self._handler($modal.find('.btn-prev'), 'click', function () {
                self._zoomSlideShow('prev', previewId);
            });
            self._handler($modal.find('.btn-next'), 'click', function () {
                self._zoomSlideShow('next', previewId);
            });
            self._handler($btnFull, 'click', function () {
                self._resizeZoomDialog(true);
            });
            self._handler($btnBord, 'click', function () {
                self._resizeZoomDialog(false);
            });
            self._handler($btnTogh, 'click', function () {
                var $header = $modal.find('.modal-header'), $floatBar = $modal.find('.modal-body .floating-buttons'),
                    ht, $actions = $header.find('.kv-zoom-actions'), resize = function (height) {
                        var $body = self.$modal.find('.kv-zoom-body'), h = self.zoomModalHeight;
                        if ($modal.hasClass('file-zoom-fullscreen')) {
                            h = $body.outerHeight(true);
                            if (!height) {
                                h = h - $header.outerHeight(true);
                            }
                        }
                        $body.css('height', height ? h + height : h);
                    };
                if ($header.is(':visible')) {
                    ht = $header.outerHeight(true);
                    $header.slideUp('slow', function () {
                        $actions.find('.btn').appendTo($floatBar);
                        resize(ht);
                    });
                } else {
                    $floatBar.find('.btn').appendTo($actions);
                    $header.slideDown('slow', function () {
                        resize();
                    });
                }
                $modal.focus();
            });
            self._handler($modal, 'keydown', function (e) {
                var key = e.which || e.keyCode, $prev = $(this).find('.btn-prev'), $next = $(this).find('.btn-next'),
                    vId = $(this).data('previewId'), vPrevKey = self.rtl ? 39 : 37, vNextKey = self.rtl ? 37 : 39;
                if (key === vPrevKey && $prev.length && !$prev.attr('disabled')) {
                    self._zoomSlideShow('prev', vId);
                }
                if (key === vNextKey && $next.length && !$next.attr('disabled')) {
                    self._zoomSlideShow('next', vId);
                }
            });
        },
        _zoomPreview: function ($btn) {
            var self = this, $frame, $modal = self.$modal;
            if (!$btn.length) {
                throw 'Cannot zoom to detailed preview!';
            }
            $h.initModal($modal);
            $modal.html(self._getModalContent());
            $frame = $btn.closest($h.FRAMES);
            self._setZoomContent($frame);
            $modal.modal('show');
            self._initZoomButtons();
        },
        _zoomSlideShow: function (dir, previewId) {
            var self = this, $btn = self.$modal.find('.kv-zoom-actions .btn-' + dir), $targFrame, i,
                thumbs = self.getFrames().toArray(), len = thumbs.length, out;
            if ($btn.attr('disabled')) {
                return;
            }
            for (i = 0; i < len; i++) {
                if ($(thumbs[i]).attr('id') === previewId) {
                    out = dir === 'prev' ? i - 1 : i + 1;
                    break;
                }
            }
            if (out < 0 || out >= len || !thumbs[out]) {
                return;
            }
            $targFrame = $(thumbs[out]);
            if ($targFrame.length) {
                self._setZoomContent($targFrame, true);
            }
            self._initZoomButtons();
            self._raise('filezoom' + dir, {'previewId': previewId, modal: self.$modal});
        },
        _initZoomButton: function () {
            var self = this;
            self.$preview.find('.kv-file-zoom').each(function () {
                var $el = $(this);
                self._handler($el, 'click', function () {
                    self._zoomPreview($el);
                });
            });
        },
        _inputFileCount: function () {
            return this.$element.get(0).files.length;
        },
        _refreshPreview: function () {
            var self = this, files;
            if ((!self._inputFileCount() && !self.isAjaxUpload) || !self.showPreview || !self.isPreviewable) {
                return;
            }
            if (self.isAjaxUpload) {
                if (self.fileManager.count() > 0) {
                    files = $.extend(true, {}, self.fileManager.stack);
                    self.fileManager.clear();
                    self._clearFileInput();
                } else {
                    files = self.$element.get(0).files;
                }
            } else {
                files = self.$element.get(0).files;
            }
            if (files && files.length) {
                self.readFiles(files);
                self._setFileDropZoneTitle();
            }
        },
        _clearObjects: function ($el) {
            $el.find('video audio').each(function () {
                this.pause();
                $(this).remove();
            });
            $el.find('img object div').each(function () {
                $(this).remove();
            });
        },
        _clearFileInput: function () {
            var self = this, $el = self.$element, $srcFrm, $tmpFrm, $tmpEl;
            if (!self._inputFileCount()) {
                return;
            }
            $srcFrm = $el.closest('form');
            $tmpFrm = $(document.createElement('form'));
            $tmpEl = $(document.createElement('div'));
            $el.before($tmpEl);
            if ($srcFrm.length) {
                $srcFrm.after($tmpFrm);
            } else {
                $tmpEl.after($tmpFrm);
            }
            $tmpFrm.append($el).trigger('reset');
            $tmpEl.before($el).remove();
            $tmpFrm.remove();
        },
        _resetUpload: function () {
            var self = this;
            self.uploadCache = [];
            self.$btnUpload.removeAttr('disabled');
            self._setProgress(0);
            self.$progress.hide();
            self._resetErrors(false);
            self._initAjax();
            self.fileManager.clearImages();
            self._resetCanvas();
            if (self.overwriteInitial) {
                self.initialPreview = [];
                self.initialPreviewConfig = [];
                self.initialPreviewThumbTags = [];
                self.previewCache.data = {
                    content: [],
                    config: [],
                    tags: []
                };
            }
        },
        _resetCanvas: function () {
            var self = this;
            if (self.canvas && self.imageCanvasContext) {
                self.imageCanvasContext.clearRect(0, 0, self.canvas.width, self.canvas.height);
            }
        },
        _hasInitialPreview: function () {
            var self = this;
            return !self.overwriteInitial && self.previewCache.count(true);
        },
        _resetPreview: function () {
            var self = this, out, cap;
            if (self.previewCache.count(true)) {
                out = self.previewCache.out();
                self._setPreviewContent(out.content);
                self._setInitThumbAttr();
                cap = self.initialCaption ? self.initialCaption : out.caption;
                self._setCaption(cap);
            } else {
                self._clearPreview();
                self._initCaption();
            }
            if (self.showPreview) {
                self._initZoom();
                self._initSortable();
            }
        },
        _clearDefaultPreview: function () {
            var self = this;
            self.$preview.find('.file-default-preview').remove();
        },
        _validateDefaultPreview: function () {
            var self = this;
            if (!self.showPreview || $h.isEmpty(self.defaultPreviewContent)) {
                return;
            }
            self._setPreviewContent('<div class="file-default-preview">' + self.defaultPreviewContent + '</div>');
            self.$container.removeClass('file-input-new');
            self._initClickable();
        },
        _resetPreviewThumbs: function (isAjax) {
            var self = this, out;
            if (isAjax) {
                self._clearPreview();
                self.clearFileStack();
                return;
            }
            if (self._hasInitialPreview()) {
                out = self.previewCache.out();
                self._setPreviewContent(out.content);
                self._setInitThumbAttr();
                self._setCaption(out.caption);
                self._initPreviewActions();
            } else {
                self._clearPreview();
            }
        },
        _getLayoutTemplate: function (t) {
            var self = this, template = self.layoutTemplates[t];
            if ($h.isEmpty(self.customLayoutTags)) {
                return template;
            }
            return $h.replaceTags(template, self.customLayoutTags);
        },
        _getPreviewTemplate: function (t) {
            var self = this, templates = self.previewTemplates, template = templates[t] || templates.other;
            if ($h.isEmpty(self.customPreviewTags)) {
                return template;
            }
            return $h.replaceTags(template, self.customPreviewTags);
        },
        _getOutData: function (formdata, jqXHR, responseData, filesData) {
            var self = this;
            jqXHR = jqXHR || {};
            responseData = responseData || {};
            filesData = filesData || self.fileManager.list();
            return {
                formdata: formdata,
                files: filesData,
                filenames: self.filenames,
                filescount: self.getFilesCount(),
                extra: self._getExtraData(),
                response: responseData,
                reader: self.reader,
                jqXHR: jqXHR
            };
        },
        _getMsgSelected: function (n) {
            var self = this, strFiles = n === 1 ? self.fileSingle : self.filePlural;
            return n > 0 ? self.msgSelected.replace('{n}', n).replace('{files}', strFiles) : self.msgNoFilesSelected;
        },
        _getFrame: function (id, skipWarning) {
            var self = this, $frame = $h.getFrameElement(self.$preview, id);
            if (self.showPreview && !skipWarning && !$frame.length) {
                self._log($h.logMessages.invalidThumb, {id: id});
            }
            return $frame;
        },
        _getZoom: function (id, selector) {
            var self = this, $frame = $h.getZoomElement(self.$preview, id, selector);
            if (self.showPreview && !$frame.length) {
                self._log($h.logMessages.invalidThumb, {id: id});
            }
            return $frame;
        },
        _getThumbs: function (css) {
            css = css || '';
            return this.getFrames(':not(.file-preview-initial)' + css);
        },
        _getThumbId: function (fileId) {
            var self = this;
            return self.previewInitId + '-' + fileId;
        },
        _getExtraData: function (fileId, index) {
            var self = this, data = self.uploadExtraData;
            if (typeof self.uploadExtraData === 'function') {
                data = self.uploadExtraData(fileId, index);
            }
            return data;
        },
        _initXhr: function (xhrobj, fileId, fileCount) {
            var self = this, fm = self.fileManager, func = function (event) {
                var pct = 0, total = event.total, loaded = event.loaded || event.position,
                    stats = fm.getUploadStats(fileId, loaded, total);
                /** @namespace event.lengthComputable */
                if (event.lengthComputable && !self.enableResumableUpload) {
                    pct = $h.round(loaded / total * 100);
                }
                if (fileId) {
                    self._setFileUploadStats(fileId, pct, fileCount, stats);
                } else {
                    self._setProgress(pct, null, null, self._getStats(stats));
                }
                self._raise('fileajaxprogress', [stats]);
            };
            if (xhrobj.upload) {
                if (self.progressDelay) {
                    func = $h.debounce(func, self.progressDelay);
                }
                xhrobj.upload.addEventListener('progress', func, false);
            }
            return xhrobj;
        },
        _initAjaxSettings: function () {
            var self = this;
            self._ajaxSettings = $.extend(true, {}, self.ajaxSettings);
            self._ajaxDeleteSettings = $.extend(true, {}, self.ajaxDeleteSettings);
        },
        _mergeAjaxCallback: function (funcName, srcFunc, type) {
            var self = this, settings = self._ajaxSettings, flag = self.mergeAjaxCallbacks, targFunc;
            if (type === 'delete') {
                settings = self._ajaxDeleteSettings;
                flag = self.mergeAjaxDeleteCallbacks;
            }
            targFunc = settings[funcName];
            if (flag && typeof targFunc === 'function') {
                if (flag === 'before') {
                    settings[funcName] = function () {
                        targFunc.apply(this, arguments);
                        srcFunc.apply(this, arguments);
                    };
                } else {
                    settings[funcName] = function () {
                        srcFunc.apply(this, arguments);
                        targFunc.apply(this, arguments);
                    };
                }
            } else {
                settings[funcName] = srcFunc;
            }
        },
        _ajaxSubmit: function (fnBefore, fnSuccess, fnComplete, fnError, formdata, fileId, index, vUrl) {
            var self = this, settings, defaults, data, processQueue;
            if (!self._raise('filepreajax', [formdata, fileId, index])) {
                return;
            }
            formdata.append('initialPreview', JSON.stringify(self.initialPreview));
            formdata.append('initialPreviewConfig', JSON.stringify(self.initialPreviewConfig));
            formdata.append('initialPreviewThumbTags', JSON.stringify(self.initialPreviewThumbTags));
            self._initAjaxSettings();
            self._mergeAjaxCallback('beforeSend', fnBefore);
            self._mergeAjaxCallback('success', fnSuccess);
            self._mergeAjaxCallback('complete', fnComplete);
            self._mergeAjaxCallback('error', fnError);
            vUrl = vUrl || self.uploadUrlThumb || self.uploadUrl;
            if (typeof vUrl === 'function') {
                vUrl = vUrl();
            }
            data = self._getExtraData(fileId, index) || {};
            if (typeof data === 'object') {
                $.each(data, function (key, value) {
                    formdata.append(key, value);
                });
            }
            defaults = {
                xhr: function () {
                    var xhrobj = $.ajaxSettings.xhr();
                    return self._initXhr(xhrobj, fileId, self.fileManager.count());
                },
                url: self._encodeURI(vUrl),
                type: 'POST',
                dataType: 'json',
                data: formdata,
                cache: false,
                processData: false,
                contentType: false
            };
            settings = $.extend(true, {}, defaults, self._ajaxSettings);
            self.ajaxQueue.push(settings);
            processQueue = function () {
                var config, xhr;
                if (self.ajaxCurrentThreads < self.maxAjaxThreads) {
                    config = self.ajaxQueue.shift();
                    if (typeof config !== 'undefined') {
                        self.ajaxCurrentThreads++;
                        xhr = $.ajax(config).done(function () {
                            clearInterval(self.ajaxQueueIntervalId);
                            self.ajaxCurrentThreads--;
                        });
                        self.ajaxRequests.push(xhr);
                    }
                }
            };
            self.ajaxQueueIntervalId = setInterval(processQueue, self.queueDelay);

        },
        _mergeArray: function (prop, content) {
            var self = this, arr1 = $h.cleanArray(self[prop]), arr2 = $h.cleanArray(content);
            self[prop] = arr1.concat(arr2);
        },
        _initUploadSuccess: function (out, $thumb, allFiles) {
            var self = this, append, data, index, $div, $newCache, content, config, tags, id, i;
            if (!self.showPreview || typeof out !== 'object' || $.isEmptyObject(out)) {
                return;
            }
            if (out.initialPreview !== undefined && out.initialPreview.length > 0) {
                self.hasInitData = true;
                content = out.initialPreview || [];
                config = out.initialPreviewConfig || [];
                tags = out.initialPreviewThumbTags || [];
                append = out.append === undefined || out.append;
                if (content.length > 0 && !$h.isArray(content)) {
                    content = content.split(self.initialPreviewDelimiter);
                }
                if (content.length) {
                    self._mergeArray('initialPreview', content);
                    self._mergeArray('initialPreviewConfig', config);
                    self._mergeArray('initialPreviewThumbTags', tags);
                }
                if ($thumb !== undefined) {
                    if (!allFiles) {
                        index = self.previewCache.add(content[0], config[0], tags[0], append);
                        data = self.previewCache.get(index, false);
                        $div = $(document.createElement('div')).html(data).hide().insertAfter($thumb);
                        $newCache = $div.find('.kv-zoom-cache');
                        if ($newCache && $newCache.length) {
                            $newCache.insertAfter($thumb);
                        }
                        $thumb.fadeOut('slow', function () {
                            var $newThumb = $div.find('.file-preview-frame');
                            if ($newThumb && $newThumb.length) {
                                $newThumb.insertBefore($thumb).fadeIn('slow').css('display:inline-block');
                            }
                            self._initPreviewActions();
                            self._clearFileInput();
                            $h.cleanZoomCache(self._getZoom($thumb.attr('id')));
                            $thumb.remove();
                            $div.remove();
                            self._initSortable();
                        });
                    } else {
                        id = $thumb.attr('id');
                        i = self._getUploadCacheIndex(id);
                        if (i !== null) {
                            self.uploadCache[i] = {
                                id: id,
                                content: content[0],
                                config: config[0] || [],
                                tags: tags[0] || [],
                                append: append
                            };
                        }
                    }
                } else {
                    self.previewCache.set(content, config, tags, append);
                    self._initPreview();
                    self._initPreviewActions();
                }
            }
        },
        _getUploadCacheIndex: function (id) {
            var self = this, i, len = self.uploadCache.length, config;
            for (i = 0; i < len; i++) {
                config = self.uploadCache[i];
                if (config.id === id) {
                    return i;
                }
            }
            return null;
        },
        _initSuccessThumbs: function () {
            var self = this;
            if (!self.showPreview) {
                return;
            }
            self._getThumbs($h.FRAMES + '.file-preview-success').each(function () {
                var $thumb = $(this), $remove = $thumb.find('.kv-file-remove');
                $remove.removeAttr('disabled');
                self._handler($remove, 'click', function () {
                    var id = $thumb.attr('id'),
                        out = self._raise('filesuccessremove', [id, $thumb.attr('data-fileindex')]);
                    $h.cleanMemory($thumb);
                    if (out === false) {
                        return;
                    }
                    $thumb.fadeOut('slow', function () {
                        $h.cleanZoomCache(self._getZoom(id));
                        $thumb.remove();
                        if (!self.getFrames().length) {
                            self.reset();
                        }
                    });
                });
            });
        },
        _updateInitialPreview: function () {
            var self = this, u = self.uploadCache;
            if (self.showPreview) {
                $.each(u, function (key, setting) {
                    self.previewCache.add(setting.content, setting.config, setting.tags, setting.append);
                });
                if (self.hasInitData) {
                    self._initPreview();
                    self._initPreviewActions();
                }
            }
        },
        _uploadSingle: function (i, id, isBatch) {
            var self = this, fm = self.fileManager, count = fm.count(), formdata = new FormData(), outData,
                previewId = self._getThumbId(id), $thumb, chkComplete, $btnUpload, $btnDelete,
                hasPostData = count > 0 || !$.isEmptyObject(self.uploadExtraData), uploadFailed, $prog, fnBefore,
                errMsg, fnSuccess, fnComplete, fnError, updateUploadLog, op = self.ajaxOperations.uploadThumb,
                fileObj = fm.getFile(id), params = {id: previewId, index: i, fileId: id},
                fileName = self.fileManager.getFileName(id, true);
            if (self.enableResumableUpload) { // not enabled for resumable uploads
                return;
            }
            if (self.showPreview) {
                $thumb = self.fileManager.getThumb(id);
                $prog = $thumb.find('.file-thumb-progress');
                $btnUpload = $thumb.find('.kv-file-upload');
                $btnDelete = $thumb.find('.kv-file-remove');
                $prog.show();
            }
            if (count === 0 || !hasPostData || (self.showPreview && $btnUpload && $btnUpload.hasClass('disabled')) ||
                self._abort(params)) {
                return;
            }
            updateUploadLog = function () {
                if (!uploadFailed) {
                    fm.removeFile(id);
                } else {
                    fm.errors.push(id);
                }
                fm.setProcessed(id);
                if (fm.isProcessed()) {
                    self.fileBatchCompleted = true;
                }
            };
            chkComplete = function () {
                var $initThumbs;
                if (!self.fileBatchCompleted) {
                    return;
                }
                setTimeout(function () {
                    var triggerReset = fm.count() === 0, errCount = fm.errors.length;
                    self._updateInitialPreview();
                    self.unlock(triggerReset);
                    if (triggerReset) {
                        self._clearFileInput();
                    }
                    $initThumbs = self.$preview.find('.file-preview-initial');
                    if (self.uploadAsync && $initThumbs.length) {
                        $h.addCss($initThumbs, $h.SORT_CSS);
                        self._initSortable();
                    }
                    self._raise('filebatchuploadcomplete', [fm.stack, self._getExtraData()]);
                    if (!self.retryErrorUploads || errCount === 0) {
                        fm.clear();
                    }
                    self._setProgress(101);
                    self.ajaxAborted = false;
                }, self.processDelay);
            };
            fnBefore = function (jqXHR) {
                outData = self._getOutData(formdata, jqXHR);
                fm.initStats(id);
                self.fileBatchCompleted = false;
                if (!isBatch) {
                    self.ajaxAborted = false;
                }
                if (self.showPreview) {
                    if (!$thumb.hasClass('file-preview-success')) {
                        self._setThumbStatus($thumb, 'Loading');
                        $h.addCss($thumb, 'file-uploading');
                    }
                    $btnUpload.attr('disabled', true);
                    $btnDelete.attr('disabled', true);
                }
                if (!isBatch) {
                    self.lock();
                }
                if (fm.errors.indexOf(id) !== -1) {
                    delete fm.errors[id];
                }
                self._raise('filepreupload', [outData, previewId, i]);
                $.extend(true, params, outData);
                if (self._abort(params)) {
                    jqXHR.abort();
                    if (!isBatch) {
                        self._setThumbStatus($thumb, 'New');
                        $thumb.removeClass('file-uploading');
                        $btnUpload.removeAttr('disabled');
                        $btnDelete.removeAttr('disabled');
                        self.unlock();
                    }
                    self._setProgressCancelled();
                }
            };
            fnSuccess = function (data, textStatus, jqXHR) {
                var pid = self.showPreview && $thumb.attr('id') ? $thumb.attr('id') : previewId;
                outData = self._getOutData(formdata, jqXHR, data);
                $.extend(true, params, outData);
                setTimeout(function () {
                    if ($h.isEmpty(data) || $h.isEmpty(data.error)) {
                        if (self.showPreview) {
                            self._setThumbStatus($thumb, 'Success');
                            $btnUpload.hide();
                            self._initUploadSuccess(data, $thumb, isBatch);
                            self._setProgress(101, $prog);
                        }
                        self._raise('fileuploaded', [outData, pid, i]);
                        if (!isBatch) {
                            self.fileManager.remove($thumb);
                        } else {
                            updateUploadLog();
                        }
                    } else {
                        uploadFailed = true;
                        errMsg = self._parseError(op, jqXHR, self.msgUploadError, self.fileManager.getFileName(id));
                        self._showFileError(errMsg, params);
                        self._setPreviewError($thumb, true);
                        if (!self.retryErrorUploads) {
                            $btnUpload.hide();
                        }
                        if (isBatch) {
                            updateUploadLog();
                        }
                        self._setProgress(101, self._getFrame(pid).find('.file-thumb-progress'),
                            self.msgUploadError);
                    }
                }, self.processDelay);
            };
            fnComplete = function () {
                setTimeout(function () {
                    if (self.showPreview) {
                        $btnUpload.removeAttr('disabled');
                        $btnDelete.removeAttr('disabled');
                        $thumb.removeClass('file-uploading');
                    }
                    if (!isBatch) {
                        self.unlock(false);
                        self._clearFileInput();
                    } else {
                        chkComplete();
                    }
                    self._initSuccessThumbs();
                }, self.processDelay);
            };
            fnError = function (jqXHR, textStatus, errorThrown) {
                errMsg = self._parseError(op, jqXHR, errorThrown, self.fileManager.getFileName(id));
                uploadFailed = true;
                setTimeout(function () {
                    var $prog;
                    if (isBatch) {
                        updateUploadLog();
                    }
                    self.fileManager.setProgress(id, 100);
                    self._setPreviewError($thumb, true);
                    if (!self.retryErrorUploads) {
                        $btnUpload.hide();
                    }
                    $.extend(true, params, self._getOutData(formdata, jqXHR));
                    self._setProgress(101, $prog, self.msgAjaxProgressError.replace('{operation}', op));
                    $prog = self.showPreview && $thumb ? $thumb.find('.file-thumb-progress') : '';
                    self._setProgress(101, $prog, self.msgUploadError);
                    self._showFileError(errMsg, params);
                }, self.processDelay);
            };
            formdata.append(self.uploadFileAttr, fileObj.file, fileName);
            self._setUploadData(formdata, {fileId: id});
            self._ajaxSubmit(fnBefore, fnSuccess, fnComplete, fnError, formdata, id, i);
        },
        _uploadBatch: function () {
            var self = this, fm = self.fileManager, total = fm.total(), params = {}, fnBefore, fnSuccess, fnError,
                fnComplete, hasPostData = total > 0 || !$.isEmptyObject(self.uploadExtraData), errMsg,
                setAllUploaded, formdata = new FormData(), op = self.ajaxOperations.uploadBatch;
            if (total === 0 || !hasPostData || self._abort(params)) {
                return;
            }
            setAllUploaded = function () {
                self.fileManager.clear();
                self._clearFileInput();
            };
            fnBefore = function (jqXHR) {
                self.lock();
                fm.initStats();
                var outData = self._getOutData(formdata, jqXHR);
                self.ajaxAborted = false;
                if (self.showPreview) {
                    self._getThumbs().each(function () {
                        var $thumb = $(this), $btnUpload = $thumb.find('.kv-file-upload'),
                            $btnDelete = $thumb.find('.kv-file-remove');
                        if (!$thumb.hasClass('file-preview-success')) {
                            self._setThumbStatus($thumb, 'Loading');
                            $h.addCss($thumb, 'file-uploading');
                        }
                        $btnUpload.attr('disabled', true);
                        $btnDelete.attr('disabled', true);
                    });
                }
                self._raise('filebatchpreupload', [outData]);
                if (self._abort(outData)) {
                    jqXHR.abort();
                    self._getThumbs().each(function () {
                        var $thumb = $(this), $btnUpload = $thumb.find('.kv-file-upload'),
                            $btnDelete = $thumb.find('.kv-file-remove');
                        if ($thumb.hasClass('file-preview-loading')) {
                            self._setThumbStatus($thumb, 'New');
                            $thumb.removeClass('file-uploading');
                        }
                        $btnUpload.removeAttr('disabled');
                        $btnDelete.removeAttr('disabled');
                    });
                    self._setProgressCancelled();
                }
            };
            fnSuccess = function (data, textStatus, jqXHR) {
                /** @namespace data.errorkeys */
                var outData = self._getOutData(formdata, jqXHR, data), key = 0,
                    $thumbs = self._getThumbs(':not(.file-preview-success)'),
                    keys = $h.isEmpty(data) || $h.isEmpty(data.errorkeys) ? [] : data.errorkeys;

                if ($h.isEmpty(data) || $h.isEmpty(data.error)) {
                    self._raise('filebatchuploadsuccess', [outData]);
                    setAllUploaded();
                    if (self.showPreview) {
                        $thumbs.each(function () {
                            var $thumb = $(this);
                            self._setThumbStatus($thumb, 'Success');
                            $thumb.removeClass('file-uploading');
                            $thumb.find('.kv-file-upload').hide().removeAttr('disabled');
                        });
                        self._initUploadSuccess(data);
                    } else {
                        self.reset();
                    }
                    self._setProgress(101);
                } else {
                    if (self.showPreview) {
                        $thumbs.each(function () {
                            var $thumb = $(this);
                            $thumb.removeClass('file-uploading');
                            $thumb.find('.kv-file-upload').removeAttr('disabled');
                            $thumb.find('.kv-file-remove').removeAttr('disabled');
                            if (keys.length === 0 || $.inArray(key, keys) !== -1) {
                                self._setPreviewError($thumb, true);
                                if (!self.retryErrorUploads) {
                                    $thumb.find('.kv-file-upload').hide();
                                    self.fileManager.remove($thumb);
                                }
                            } else {
                                $thumb.find('.kv-file-upload').hide();
                                self._setThumbStatus($thumb, 'Success');
                                self.fileManager.remove($thumb);
                            }
                            if (!$thumb.hasClass('file-preview-error') || self.retryErrorUploads) {
                                key++;
                            }
                        });
                        self._initUploadSuccess(data);
                    }
                    errMsg = self._parseError(op, jqXHR, self.msgUploadError);
                    self._showFileError(errMsg, outData, 'filebatchuploaderror');
                    self._setProgress(101, self.$progress, self.msgUploadError);
                }
            };
            fnComplete = function () {
                self.unlock();
                self._initSuccessThumbs();
                self._clearFileInput();
                self._raise('filebatchuploadcomplete', [self.fileManager.stack, self._getExtraData()]);
            };
            fnError = function (jqXHR, textStatus, errorThrown) {
                var outData = self._getOutData(formdata, jqXHR);
                errMsg = self._parseError(op, jqXHR, errorThrown);
                self._showFileError(errMsg, outData, 'filebatchuploaderror');
                self.uploadFileCount = total - 1;
                if (!self.showPreview) {
                    return;
                }
                self._getThumbs().each(function () {
                    var $thumb = $(this);
                    $thumb.removeClass('file-uploading');
                    if (self.fileManager.getFile($thumb.attr('data-fileid'))) {
                        self._setPreviewError($thumb);
                    }
                });
                self._getThumbs().removeClass('file-uploading');
                self._getThumbs(' .kv-file-upload').removeAttr('disabled');
                self._getThumbs(' .kv-file-delete').removeAttr('disabled');
                self._setProgress(101, self.$progress, self.msgAjaxProgressError.replace('{operation}', op));
            };
            var ctr = 0;
            $.each(self.fileManager.stack, function (key, data) {
                if (!$h.isEmpty(data.file)) {
                    formdata.append(self.uploadFileAttr, data.file, (data.nameFmt || ('untitled_' + ctr)));
                }
                ctr++;
            });
            self._ajaxSubmit(fnBefore, fnSuccess, fnComplete, fnError, formdata);
        },
        _uploadExtraOnly: function () {
            var self = this, params = {}, fnBefore, fnSuccess, fnComplete, fnError, formdata = new FormData(), errMsg,
                op = self.ajaxOperations.uploadExtra;
            if (self._abort(params)) {
                return;
            }
            fnBefore = function (jqXHR) {
                self.lock();
                var outData = self._getOutData(formdata, jqXHR);
                self._raise('filebatchpreupload', [outData]);
                self._setProgress(50);
                params.data = outData;
                params.xhr = jqXHR;
                if (self._abort(params)) {
                    jqXHR.abort();
                    self._setProgressCancelled();
                }
            };
            fnSuccess = function (data, textStatus, jqXHR) {
                var outData = self._getOutData(formdata, jqXHR, data);
                if ($h.isEmpty(data) || $h.isEmpty(data.error)) {
                    self._raise('filebatchuploadsuccess', [outData]);
                    self._clearFileInput();
                    self._initUploadSuccess(data);
                    self._setProgress(101);
                } else {
                    errMsg = self._parseError(op, jqXHR, self.msgUploadError);
                    self._showFileError(errMsg, outData, 'filebatchuploaderror');
                }
            };
            fnComplete = function () {
                self.unlock();
                self._clearFileInput();
                self._raise('filebatchuploadcomplete', [self.fileManager.stack, self._getExtraData()]);
            };
            fnError = function (jqXHR, textStatus, errorThrown) {
                var outData = self._getOutData(formdata, jqXHR);
                errMsg = self._parseError(op, jqXHR, errorThrown);
                params.data = outData;
                self._showFileError(errMsg, outData, 'filebatchuploaderror');
                self._setProgress(101, self.$progress, self.msgAjaxProgressError.replace('{operation}', op));
            };
            self._ajaxSubmit(fnBefore, fnSuccess, fnComplete, fnError, formdata);
        },
        _deleteFileIndex: function ($frame) {
            var self = this, ind = $frame.attr('data-fileindex'), rev = self.reversePreviewOrder;
            if (ind.substring(0, 5) === $h.INIT_FLAG) {
                ind = parseInt(ind.replace($h.INIT_FLAG, ''));
                self.initialPreview = $h.spliceArray(self.initialPreview, ind, rev);
                self.initialPreviewConfig = $h.spliceArray(self.initialPreviewConfig, ind, rev);
                self.initialPreviewThumbTags = $h.spliceArray(self.initialPreviewThumbTags, ind, rev);
                self.getFrames().each(function () {
                    var $nFrame = $(this), nInd = $nFrame.attr('data-fileindex');
                    if (nInd.substring(0, 5) === $h.INIT_FLAG) {
                        nInd = parseInt(nInd.replace($h.INIT_FLAG, ''));
                        if (nInd > ind) {
                            nInd--;
                            $nFrame.attr('data-fileindex', $h.INIT_FLAG + nInd);
                        }
                    }
                });
            }
        },
        _initFileActions: function () {
            var self = this;
            if (!self.showPreview) {
                return;
            }
            self._initZoomButton();
            self.getFrames(' .kv-file-remove').each(function () {
                var $el = $(this), $frame = $el.closest($h.FRAMES), hasError, id = $frame.attr('id'),
                    ind = $frame.attr('data-fileindex'), n, cap, status;
                self._handler($el, 'click', function () {
                    status = self._raise('filepreremove', [id, ind]);
                    if (status === false || !self._validateMinCount()) {
                        return false;
                    }
                    hasError = $frame.hasClass('file-preview-error');
                    $h.cleanMemory($frame);
                    $frame.fadeOut('slow', function () {
                        $h.cleanZoomCache(self._getZoom(id));
                        self.fileManager.remove($frame);
                        self._clearObjects($frame);
                        $frame.remove();
                        if (id && hasError) {
                            self.$errorContainer.find('li[data-thumb-id="' + id + '"]').fadeOut('fast', function () {
                                $(this).remove();
                                if (!self._errorsExist()) {
                                    self._resetErrors();
                                }
                            });
                        }
                        self._clearFileInput();
                        var chk = self.previewCache.count(true), len = self.fileManager.count(),
                            file, hasThumb = self.showPreview && self.getFrames().length;
                        if (len === 0 && chk === 0 && !hasThumb) {
                            self.reset();
                        } else {
                            n = chk + len;
                            if (n > 1) {
                                cap = self._getMsgSelected(n);
                            } else {
                                file = self.fileManager.getFirstFile();
                                cap = file ? file.nameFmt : '_';
                            }
                            self._setCaption(cap);
                        }
                        self._raise('fileremoved', [id, ind]);
                    });
                });
            });
            self.getFrames(' .kv-file-upload').each(function () {
                var $el = $(this);
                self._handler($el, 'click', function () {
                    var $frame = $el.closest($h.FRAMES), fileId = $frame.attr('data-fileid');
                    self.$progress.hide();
                    if ($frame.hasClass('file-preview-error') && !self.retryErrorUploads) {
                        return;
                    }
                    self._uploadSingle(self.fileManager.getIndex(fileId), fileId, false);
                });
            });
        },
        _initPreviewActions: function () {
            var self = this, $preview = self.$preview, deleteExtraData = self.deleteExtraData || {},
                btnRemove = $h.FRAMES + ' .kv-file-remove', settings = self.fileActionSettings,
                origClass = settings.removeClass, errClass = settings.removeErrorClass,
                resetProgress = function () {
                    var hasFiles = self.isAjaxUpload ? self.previewCache.count(true) : self._inputFileCount();
                    if (!self.getFrames().length && !hasFiles) {
                        self._setCaption('');
                        self.reset();
                        self.initialCaption = '';
                    }
                };
            self._initZoomButton();
            $preview.find(btnRemove).each(function () {
                var $el = $(this), vUrl = $el.data('url') || self.deleteUrl, vKey = $el.data('key'), errMsg, fnBefore,
                    fnSuccess, fnError, op = self.ajaxOperations.deleteThumb;
                if ($h.isEmpty(vUrl) || vKey === undefined) {
                    return;
                }
                if (typeof vUrl === 'function') {
                    vUrl = vUrl();
                }
                var $frame = $el.closest($h.FRAMES), cache = self.previewCache.data, settings, params, config,
                    fileName, extraData, index = $frame.attr('data-fileindex');
                index = parseInt(index.replace($h.INIT_FLAG, ''));
                config = $h.isEmpty(cache.config) && $h.isEmpty(cache.config[index]) ? null : cache.config[index];
                extraData = $h.isEmpty(config) || $h.isEmpty(config.extra) ? deleteExtraData : config.extra;
                fileName = config.filename || config.caption || '';
                if (typeof extraData === 'function') {
                    extraData = extraData();
                }
                params = {id: $el.attr('id'), key: vKey, extra: extraData};
                fnBefore = function (jqXHR) {
                    self.ajaxAborted = false;
                    self._raise('filepredelete', [vKey, jqXHR, extraData]);
                    if (self._abort()) {
                        jqXHR.abort();
                    } else {
                        $el.removeClass(errClass);
                        $h.addCss($frame, 'file-uploading');
                        $h.addCss($el, 'disabled ' + origClass);
                    }
                };
                fnSuccess = function (data, textStatus, jqXHR) {
                    var n, cap;
                    if (!$h.isEmpty(data) && !$h.isEmpty(data.error)) {
                        params.jqXHR = jqXHR;
                        params.response = data;
                        errMsg = self._parseError(op, jqXHR, self.msgDeleteError, fileName);
                        self._showFileError(errMsg, params, 'filedeleteerror');
                        $frame.removeClass('file-uploading');
                        $el.removeClass('disabled ' + origClass).addClass(errClass);
                        resetProgress();
                        return;
                    }
                    $frame.removeClass('file-uploading').addClass('file-deleted');
                    $frame.fadeOut('slow', function () {
                        index = parseInt(($frame.attr('data-fileindex')).replace($h.INIT_FLAG, ''));
                        self.previewCache.unset(index);
                        self._deleteFileIndex($frame);
                        n = self.previewCache.count(true);
                        cap = n > 0 ? self._getMsgSelected(n) : '';
                        self._setCaption(cap);
                        self._raise('filedeleted', [vKey, jqXHR, extraData]);
                        $h.cleanZoomCache(self._getZoom($frame.attr('id')));
                        self._clearObjects($frame);
                        $frame.remove();
                        resetProgress();
                    });
                };
                fnError = function (jqXHR, textStatus, errorThrown) {
                    var errMsg = self._parseError(op, jqXHR, errorThrown, fileName);
                    params.jqXHR = jqXHR;
                    params.response = {};
                    self._showFileError(errMsg, params, 'filedeleteerror');
                    $frame.removeClass('file-uploading');
                    $el.removeClass('disabled ' + origClass).addClass(errClass);
                    resetProgress();
                };
                self._initAjaxSettings();
                self._mergeAjaxCallback('beforeSend', fnBefore, 'delete');
                self._mergeAjaxCallback('success', fnSuccess, 'delete');
                self._mergeAjaxCallback('error', fnError, 'delete');
                settings = $.extend(true, {}, {
                    url: self._encodeURI(vUrl),
                    type: 'POST',
                    dataType: 'json',
                    data: $.extend(true, {}, {key: vKey}, extraData)
                }, self._ajaxDeleteSettings);
                self._handler($el, 'click', function () {
                    if (!self._validateMinCount()) {
                        return false;
                    }
                    self.ajaxAborted = false;
                    self._raise('filebeforedelete', [vKey, extraData]);
                    //noinspection JSUnresolvedVariable,JSHint
                    if (self.ajaxAborted instanceof Promise) {
                        self.ajaxAborted.then(function (result) {
                            if (!result) {
                                $.ajax(settings);
                            }
                        });
                    } else {
                        if (!self.ajaxAborted) {
                            $.ajax(settings);
                        }
                    }
                });
            });
        },
        _hideFileIcon: function () {
            var self = this;
            if (self.overwriteInitial) {
                self.$captionContainer.removeClass('icon-visible');
            }
        },
        _showFileIcon: function () {
            var self = this;
            $h.addCss(self.$captionContainer, 'icon-visible');
        },
        _getSize: function (bytes, sizes) {
            var self = this, size = parseFloat(bytes), i, func = self.fileSizeGetter, out;
            if (!$.isNumeric(bytes) || !$.isNumeric(size)) {
                return '';
            }
            if (typeof func === 'function') {
                out = func(size);
            } else {
                if (size === 0) {
                    out = '0.00 B';
                } else {
                    i = Math.floor(Math.log(size) / Math.log(1024));
                    if (!sizes) {
                        sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                    }
                    out = (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + sizes[i];
                }
            }
            return self._getLayoutTemplate('size').replace('{sizeText}', out);
        },
        _getFileType: function (ftype) {
            var self = this;
            return self.mimeTypeAliases[ftype] || ftype;
        },
        _generatePreviewTemplate: function (
            cat,
            data,
            fname,
            ftype,
            previewId,
            fileId,
            isError,
            size,
            frameClass,
            foot,
            ind,
            templ,
            attrs,
            zoomData
        ) {
            var self = this, caption = self.slug(fname), prevContent, zoomContent = '', styleAttribs = '',
                screenW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
                config, title = caption, alt = caption, typeCss = 'type-default', getContent,
                footer = foot || self._renderFileFooter(cat, caption, size, 'auto', isError),
                forcePrevIcon = self.preferIconicPreview, forceZoomIcon = self.preferIconicZoomPreview,
                newCat = forcePrevIcon ? 'other' : cat;
            config = screenW < 400 ? (self.previewSettingsSmall[newCat] || self.defaults.previewSettingsSmall[newCat]) :
                (self.previewSettings[newCat] || self.defaults.previewSettings[newCat]);
            if (config) {
                $.each(config, function (key, val) {
                    styleAttribs += key + ':' + val + ';';
                });
            }
            getContent = function (c, d, zoom, frameCss) {
                var id = zoom ? 'zoom-' + previewId : previewId, tmplt = self._getPreviewTemplate(c),
                    css = (frameClass || '') + ' ' + frameCss;
                if (self.frameClass) {
                    css = self.frameClass + ' ' + css;
                }
                if (zoom) {
                    css = css.replace(' ' + $h.SORT_CSS, '');
                }
                tmplt = self._parseFilePreviewIcon(tmplt, fname);
                if (c === 'text') {
                    d = $h.htmlEncode(d);
                }
                if (cat === 'object' && !ftype) {
                    $.each(self.defaults.fileTypeSettings, function (key, func) {
                        if (key === 'object' || key === 'other') {
                            return;
                        }
                        if (func(fname, ftype)) {
                            typeCss = 'type-' + key;
                        }
                    });
                }
                if (!$h.isEmpty(attrs)) {
                    if (attrs.title !== undefined && attrs.title !== null) {
                        title = attrs.title;
                    }
                    if (attrs.alt !== undefined && attrs.alt !== null) {
                        title = attrs.alt;
                    }
                }
                return tmplt.setTokens({
                    'previewId': id,
                    'caption': caption,
                    'title': title,
                    'alt': alt,
                    'frameClass': css,
                    'type': self._getFileType(ftype),
                    'fileindex': ind,
                    'fileid': fileId || '',
                    'typeCss': typeCss,
                    'footer': footer,
                    'data': d,
                    'template': templ || cat,
                    'style': styleAttribs ? 'style="' + styleAttribs + '"' : ''
                });
            };
            ind = ind || previewId.slice(previewId.lastIndexOf('-') + 1);
            if (self.fileActionSettings.showZoom) {
                zoomContent = getContent((forceZoomIcon ? 'other' : cat), zoomData ? zoomData : data, true,
                    'kv-zoom-thumb');
            }
            zoomContent = '\n' + self._getLayoutTemplate('zoomCache').replace('{zoomContent}', zoomContent);
            if (typeof self.sanitizeZoomCache === 'function') {
                zoomContent = self.sanitizeZoomCache(zoomContent);
            }
            prevContent = getContent((forcePrevIcon ? 'other' : cat), data, false, 'kv-preview-thumb');
            return prevContent + zoomContent;
        },
        _addToPreview: function ($preview, content) {
            var self = this;
            return self.reversePreviewOrder ? $preview.prepend(content) : $preview.append(content);
        },
        _previewDefault: function (file, isDisabled) {
            var self = this, $preview = self.$preview;
            if (!self.showPreview) {
                return;
            }
            var fname = $h.getFileName(file), ftype = file ? file.type : '', content, size = file.size || 0,
                caption = self._getFileName(file, ''), isError = isDisabled === true && !self.isAjaxUpload,
                data = $h.createObjectURL(file), fileId = self.fileManager.getId(file),
                previewId = self._getThumbId(fileId);
            self._clearDefaultPreview();
            content = self._generatePreviewTemplate('other', data, fname, ftype, previewId, fileId, isError, size);
            self._addToPreview($preview, content);
            self._setThumbAttr(previewId, caption, size);
            if (isDisabled === true && self.isAjaxUpload) {
                self._setThumbStatus(self._getFrame(previewId), 'Error');
            }
        },
        _previewFile: function (i, file, theFile, data, fileInfo) {
            if (!this.showPreview) {
                return;
            }
            var self = this, fname = $h.getFileName(file), ftype = fileInfo.type, caption = fileInfo.name,
                cat = self._parseFileType(ftype, fname), content, $preview = self.$preview, fsize = file.size || 0,
                iData = (cat === 'text' || cat === 'html' || cat === 'image') ? theFile.target.result : data,
                fileId = self.fileManager.getId(file), previewId = self._getThumbId(fileId);
            /** @namespace window.DOMPurify */
            if (cat === 'html' && self.purifyHtml && window.DOMPurify) {
                iData = window.DOMPurify.sanitize(iData);
            }
            content = self._generatePreviewTemplate(cat, iData, fname, ftype, previewId, fileId, false, fsize);
            self._clearDefaultPreview();
            self._addToPreview($preview, content);
            var $thumb = self._getFrame(previewId);
            self._validateImageOrientation($thumb.find('img'), file, previewId, fileId, caption, ftype, fsize, iData);
            self._setThumbAttr(previewId, caption, fsize);
            self._initSortable();
        },
        _setThumbAttr: function (id, caption, size) {
            var self = this, $frame = self._getFrame(id);
            if ($frame.length) {
                size = size && size > 0 ? self._getSize(size) : '';
                $frame.data({'caption': caption, 'size': size});
            }
        },
        _setInitThumbAttr: function () {
            var self = this, data = self.previewCache.data, len = self.previewCache.count(true), config,
                caption, size, previewId;
            if (len === 0) {
                return;
            }
            for (var i = 0; i < len; i++) {
                config = data.config[i];
                previewId = self.previewInitId + '-' + $h.INIT_FLAG + i;
                caption = $h.ifSet('caption', config, $h.ifSet('filename', config));
                size = $h.ifSet('size', config);
                self._setThumbAttr(previewId, caption, size);
            }
        },
        _slugDefault: function (text) {
            // noinspection RegExpRedundantEscape
            return $h.isEmpty(text) ? '' : String(text).replace(/[\[\]\/\{}:;#%=\(\)\*\+\?\\\^\$\|<>&"']/g, '_');
        },
        _updateFileDetails: function (numFiles) {
            var self = this, $el = self.$element, label, n, log, nFiles, file,
                name = ($h.isIE(9) && $h.findFileName($el.val())) || ($el[0].files[0] && $el[0].files[0].name);
            if (!name && self.fileManager.count() > 0) {
                file = self.fileManager.getFirstFile();
                label = file.nameFmt;
            } else {
                label = name ? self.slug(name) : '_';
            }
            n = self.isAjaxUpload ? self.fileManager.count() : numFiles;
            nFiles = self.previewCache.count(true) + n;
            log = n === 1 ? label : self._getMsgSelected(nFiles);
            if (self.isError) {
                self.$previewContainer.removeClass('file-thumb-loading');
                self.$previewStatus.html('');
                self.$captionContainer.removeClass('icon-visible');
            } else {
                self._showFileIcon();
            }
            self._setCaption(log, self.isError);
            self.$container.removeClass('file-input-new file-input-ajax-new');
            if (arguments.length === 1) {
                self._raise('fileselect', [numFiles, label]);
            }
            if (self.previewCache.count(true)) {
                self._initPreviewActions();
            }
        },
        _setThumbStatus: function ($thumb, status) {
            var self = this;
            if (!self.showPreview) {
                return;
            }
            var icon = 'indicator' + status, msg = icon + 'Title',
                css = 'file-preview-' + status.toLowerCase(),
                $indicator = $thumb.find('.file-upload-indicator'),
                config = self.fileActionSettings;
            $thumb.removeClass('file-preview-success file-preview-error file-preview-paused file-preview-loading');
            if (status === 'Success') {
                $thumb.find('.file-drag-handle').remove();
            }
            $indicator.html(config[icon]);
            $indicator.attr('title', config[msg]);
            $thumb.addClass(css);
            if (status === 'Error' && !self.retryErrorUploads) {
                $thumb.find('.kv-file-upload').attr('disabled', true);
            }
        },
        _setProgressCancelled: function () {
            var self = this;
            self._setProgress(101, self.$progress, self.msgCancelled);
        },
        _setProgress: function (p, $el, error, stats) {
            var self = this;
            $el = $el || self.$progress;
            if (!$el.length) {
                return;
            }
            var pct = Math.min(p, 100), out, pctLimit = self.progressUploadThreshold,
                t = p <= 100 ? self.progressTemplate : self.progressCompleteTemplate,
                template = pct < 100 ? self.progressTemplate :
                    (error ? (self.paused ? self.progressPauseTemplate : self.progressErrorTemplate) : t);
            if (p >= 100) {
                stats = '';
            }
            if (!$h.isEmpty(template)) {
                if (pctLimit && pct > pctLimit && p <= 100) {
                    out = template.setTokens({'percent': pctLimit, 'status': self.msgUploadThreshold});
                } else {
                    out = template.setTokens({'percent': pct, 'status': (p > 100 ? self.msgUploadEnd : pct + '%')});
                }
                stats = stats || '';
                out = out.setTokens({stats: stats});
                $el.html(out);
                if (error) {
                    $el.find('[role="progressbar"]').html(error);
                }
            }
        },
        _setFileDropZoneTitle: function () {
            var self = this, $zone = self.$container.find('.file-drop-zone'), title = self.dropZoneTitle, strFiles;
            if (self.isClickable) {
                strFiles = $h.isEmpty(self.$element.attr('multiple')) ? self.fileSingle : self.filePlural;
                title += self.dropZoneClickTitle.replace('{files}', strFiles);
            }
            $zone.find('.' + self.dropZoneTitleClass).remove();
            if (!self.showPreview || $zone.length === 0 || self.fileManager.count() > 0 || !self.dropZoneEnabled ||
                (!self.isAjaxUpload && self.$element.files)) {
                return;
            }
            if ($zone.find($h.FRAMES).length === 0 && $h.isEmpty(self.defaultPreviewContent)) {
                $zone.prepend('<div class="' + self.dropZoneTitleClass + '">' + title + '</div>');
            }
            self.$container.removeClass('file-input-new');
            $h.addCss(self.$container, 'file-input-ajax-new');
        },
        _getStats: function (stats) {
            var self = this, pendingTime, t;
            if (!self.showUploadStats || !stats || !stats.bitrate) {
                return '';
            }
            t = self._getLayoutTemplate('stats');
            pendingTime = (!stats.elapsed || !stats.bps) ? self.msgCalculatingTime :
                self.msgPendingTime.setTokens({time: $h.getElapsed(Math.ceil(stats.pendingBytes / stats.bps))});

            return t.setTokens({
                uploadSpeed: stats.bitrate,
                pendingTime: pendingTime
            });
        },
        _setResumableProgress: function (pct, stats, $thumb) {
            var self = this, rm = self.resumableManager, obj = $thumb ? rm : self,
                $prog = $thumb ? $thumb.find('.file-thumb-progress') : null;
            if (obj.lastProgress === 0) {
                obj.lastProgress = pct;
            }
            if (pct < obj.lastProgress) {
                pct = obj.lastProgress;
            }
            self._setProgress(pct, $prog, null, self._getStats(stats));
            obj.lastProgress = pct;
        },
        _setFileUploadStats: function (id, pct, total, stats) {
            var self = this, $prog = self.$progress;
            if (!self.showPreview && (!$prog || !$prog.length)) {
                return;
            }
            var fm = self.fileManager, $thumb = fm.getThumb(id), pctTot, rm = self.resumableManager,
                totUpSize = 0, totSize = fm.getTotalSize(), totStats = $.extend(true, {}, stats);
            if (self.enableResumableUpload) {
                var loaded = stats.loaded, currUplSize = rm.getUploadedSize(), currTotSize = rm.file.size, totLoaded;
                loaded += currUplSize;
                totLoaded = fm.uploadedSize + loaded;
                pct = $h.round(100 * loaded / currTotSize);
                stats.pendingBytes = currTotSize - currUplSize;
                self._setResumableProgress(pct, stats, $thumb);
                pctTot = Math.floor(100 * totLoaded / totSize);
                totStats.pendingBytes = totSize - totLoaded;
                self._setResumableProgress(pctTot, totStats);
            } else {
                fm.setProgress(id, pct);
                $prog = $thumb && $thumb.length ? $thumb.find('.file-thumb-progress') : null;
                self._setProgress(pct, $prog, null, self._getStats(stats));
                $.each(fm.stats, function (id, cfg) {
                    totUpSize += cfg.loaded;
                });
                totStats.pendingBytes = totSize - totUpSize;
                pctTot = $h.round(totUpSize / totSize * 100);
                self._setProgress(pctTot, null, null, self._getStats(totStats));
            }
        },
        _validateMinCount: function () {
            var self = this, len = self.isAjaxUpload ? self.fileManager.count() : self._inputFileCount();
            if (self.validateInitialCount && self.minFileCount > 0 && self._getFileCount(len - 1) < self.minFileCount) {
                self._noFilesError({});
                return false;
            }
            return true;
        },
        _getFileCount: function (fileCount, includeInitial) {
            var self = this, addCount = 0;
            if (includeInitial === undefined) {
                includeInitial = self.validateInitialCount && !self.overwriteInitial;
            }
            if (includeInitial) {
                addCount = self.previewCache.count(true);
                fileCount += addCount;
            }
            return fileCount;
        },
        _getFileId: function (file) {
            return $h.getFileId(file, this.generateFileId);
        },
        _getFileName: function (file, defaultValue) {
            var self = this, fileName = $h.getFileName(file);
            return fileName ? self.slug(fileName) : defaultValue;
        },
        _getFileNames: function (skipNull) {
            var self = this;
            return self.filenames.filter(function (n) {
                return (skipNull ? n !== undefined : n !== undefined && n !== null);
            });
        },
        _setPreviewError: function ($thumb, keepFile) {
            var self = this, removeFrame = self.removeFromPreviewOnError && !self.retryErrorUploads;
            if (!keepFile || removeFrame) {
                self.fileManager.remove($thumb);
            }
            if (!self.showPreview) {
                return;
            }
            if (removeFrame) {
                $thumb.remove();
                return;
            } else {
                self._setThumbStatus($thumb, 'Error');
            }
            self._refreshUploadButton($thumb);
        },
        _refreshUploadButton: function ($thumb) {
            var self = this, $btn = $thumb.find('.kv-file-upload'), cfg = self.fileActionSettings,
                icon = cfg.uploadIcon, title = cfg.uploadTitle;
            if (!$btn.length) {
                return;
            }
            if (self.retryErrorUploads) {
                icon = cfg.uploadRetryIcon;
                title = cfg.uploadRetryTitle;
            }
            $btn.attr('title', title).html(icon);
        },
        _checkDimensions: function (i, chk, $img, $thumb, fname, type, params) {
            var self = this, msg, dim, tag = chk === 'Small' ? 'min' : 'max', limit = self[tag + 'Image' + type],
                $imgEl, isValid;
            if ($h.isEmpty(limit) || !$img.length) {
                return;
            }
            $imgEl = $img[0];
            dim = (type === 'Width') ? $imgEl.naturalWidth || $imgEl.width : $imgEl.naturalHeight || $imgEl.height;
            isValid = chk === 'Small' ? dim >= limit : dim <= limit;
            if (isValid) {
                return;
            }
            msg = self['msgImage' + type + chk].setTokens({'name': fname, 'size': limit});
            self._showFileError(msg, params);
            self._setPreviewError($thumb);
        },
        _getExifObj: function (data) {
            var self = this, exifObj = null, error = $h.logMessages.exifWarning;
            if (data.slice(0, 23) !== 'data:image/jpeg;base64,' && data.slice(0, 22) !== 'data:image/jpg;base64,') {
                exifObj = null;
                return;
            }
            try {
                exifObj = window.piexif ? window.piexif.load(data) : null;
            } catch (err) {
                exifObj = null;
                error = err && err.message || '';
            }
            if (!exifObj) {
                self._log($h.logMessages.badExifParser, {details: error});
            }
            return exifObj;
        },
        setImageOrientation: function ($img, $zoomImg, value, $thumb) {
            var self = this, invalidImg = !$img || !$img.length, invalidZoomImg = !$zoomImg || !$zoomImg.length, $mark,
                isHidden = false, $div, zoomOnly = invalidImg && $thumb && $thumb.attr('data-template') === 'image', ev;
            if (invalidImg && invalidZoomImg) {
                return;
            }
            ev = 'load.fileinputimageorient';
            if (zoomOnly) {
                $img = $zoomImg;
                $zoomImg = null;
                $img.css(self.previewSettings.image);
                $div = $(document.createElement('div')).appendTo($thumb.find('.kv-file-content'));
                $mark = $(document.createElement('span')).insertBefore($img);
                $img.css('visibility', 'hidden').removeClass('file-zoom-detail').appendTo($div);
            } else {
                isHidden = !$img.is(':visible');
            }
            $img.off(ev).on(ev, function () {
                if (isHidden) {
                    self.$preview.removeClass('hide-content');
                    $thumb.find('.kv-file-content').css('visibility', 'hidden');
                }
                var img = $img.get(0), zoomImg = $zoomImg && $zoomImg.length ? $zoomImg.get(0) : null,
                    h = img.offsetHeight, w = img.offsetWidth, r = $h.getRotation(value);
                if (isHidden) {
                    $thumb.find('.kv-file-content').css('visibility', 'visible');
                    self.$preview.addClass('hide-content');
                }
                $img.data('orientation', value);
                if (zoomImg) {
                    $zoomImg.data('orientation', value);
                }
                if (value < 5) {
                    $h.setTransform(img, r);
                    $h.setTransform(zoomImg, r);
                    return;
                }
                var offsetAngle = Math.atan(w / h), origFactor = Math.sqrt(Math.pow(h, 2) + Math.pow(w, 2)),
                    scale = !origFactor ? 1 : (h / Math.cos(Math.PI / 2 + offsetAngle)) / origFactor,
                    s = ' scale(' + Math.abs(scale) + ')';
                $h.setTransform(img, r + s);
                $h.setTransform(zoomImg, r + s);
                if (zoomOnly) {
                    $img.css('visibility', 'visible').insertAfter($mark).addClass('file-zoom-detail');
                    $mark.remove();
                    $div.remove();
                }
            });
        },
        _validateImageOrientation: function ($img, file, previewId, fileId, caption, ftype, fsize, iData) {
            var self = this, exifObj, value, autoOrientImage = self.autoOrientImage,
                selector = $h.getZoomSelector(previewId, ' img');
            exifObj = autoOrientImage ? self._getExifObj(iData) : null;
            value = exifObj ? exifObj['0th'][piexif.ImageIFD.Orientation] : null; // jshint ignore:line
            if (!value) {
                self._validateImage(previewId, fileId, caption, ftype, fsize, iData, exifObj);
                return;
            }
            self.setImageOrientation($img, $(selector), value, self._getFrame(previewId));
            self._raise('fileimageoriented', {'$img': $img, 'file': file});
            self._validateImage(previewId, fileId, caption, ftype, fsize, iData, exifObj);
        },
        _validateImage: function (previewId, fileId, fname, ftype, fsize, iData, exifObj) {
            var self = this, $preview = self.$preview, params, w1, w2, $thumb = self._getFrame(previewId),
                i = $thumb.attr('data-fileindex'), $img = $thumb.find('img');
            fname = fname || 'Untitled';
            $img.one('load', function () {
                w1 = $thumb.width();
                w2 = $preview.width();
                if (w1 > w2) {
                    $img.css('width', '100%');
                }
                params = {ind: i, id: previewId, fileId: fileId};
                self._checkDimensions(i, 'Small', $img, $thumb, fname, 'Width', params);
                self._checkDimensions(i, 'Small', $img, $thumb, fname, 'Height', params);
                if (!self.resizeImage) {
                    self._checkDimensions(i, 'Large', $img, $thumb, fname, 'Width', params);
                    self._checkDimensions(i, 'Large', $img, $thumb, fname, 'Height', params);
                }
                self._raise('fileimageloaded', [previewId]);
                self.fileManager.addImage(fileId, {
                    ind: i,
                    img: $img,
                    thumb: $thumb,
                    pid: previewId,
                    typ: ftype,
                    siz: fsize,
                    validated: false,
                    imgData: iData,
                    exifObj: exifObj
                });
                $thumb.data('exif', exifObj);
                self._validateAllImages();
            }).one('error', function () {
                self._raise('fileimageloaderror', [previewId]);
            }).each(function () {
                if (this.complete) {
                    $(this).trigger('load');
                } else {
                    if (this.error) {
                        $(this).trigger('error');
                    }
                }
            });
        },
        _validateAllImages: function () {
            var self = this, counter = {val: 0}, numImgs = self.fileManager.getImageCount(), fsize,
                minSize = self.resizeIfSizeMoreThan;
            if (numImgs !== self.fileManager.totalImages) {
                return;
            }
            self._raise('fileimagesloaded');
            if (!self.resizeImage) {
                return;
            }
            $.each(self.fileManager.loadedImages, function (id, config) {
                if (!config.validated) {
                    fsize = config.siz;
                    if (fsize && fsize > minSize * 1000) {
                        self._getResizedImage(id, config, counter, numImgs);
                    }
                    config.validated = true;
                }
            });
        },
        _getResizedImage: function (id, config, counter, numImgs) {
            var self = this, img = $(config.img)[0], width = img.naturalWidth, height = img.naturalHeight, blob,
                ratio = 1, maxWidth = self.maxImageWidth || width, maxHeight = self.maxImageHeight || height,
                isValidImage = !!(width && height), chkWidth, chkHeight, canvas = self.imageCanvas, dataURI,
                context = self.imageCanvasContext, type = config.typ, pid = config.pid, ind = config.ind,
                $thumb = config.thumb, throwError, msg, exifObj = config.exifObj, exifStr, file, params, evParams;
            throwError = function (msg, params, ev) {
                if (self.isAjaxUpload) {
                    self._showFileError(msg, params, ev);
                } else {
                    self._showError(msg, params, ev);
                }
                self._setPreviewError($thumb);
            };
            file = self.fileManager.getFile(id);
            params = {id: pid, 'index': ind, fileId: id};
            evParams = [id, pid, ind];
            if (!file || !isValidImage || (width <= maxWidth && height <= maxHeight)) {
                if (isValidImage && file) {
                    self._raise('fileimageresized', evParams);
                }
                counter.val++;
                if (counter.val === numImgs) {
                    self._raise('fileimagesresized');
                }
                if (!isValidImage) {
                    throwError(self.msgImageResizeError, params, 'fileimageresizeerror');
                    return;
                }
            }
            type = type || self.resizeDefaultImageType;
            chkWidth = width > maxWidth;
            chkHeight = height > maxHeight;
            if (self.resizePreference === 'width') {
                ratio = chkWidth ? maxWidth / width : (chkHeight ? maxHeight / height : 1);
            } else {
                ratio = chkHeight ? maxHeight / height : (chkWidth ? maxWidth / width : 1);
            }
            self._resetCanvas();
            width *= ratio;
            height *= ratio;
            canvas.width = width;
            canvas.height = height;
            try {
                context.drawImage(img, 0, 0, width, height);
                dataURI = canvas.toDataURL(type, self.resizeQuality);
                if (exifObj) {
                    exifStr = window.piexif.dump(exifObj);
                    dataURI = window.piexif.insert(exifStr, dataURI);
                }
                blob = $h.dataURI2Blob(dataURI);
                self.fileManager.setFile(id, blob);
                self._raise('fileimageresized', evParams);
                counter.val++;
                if (counter.val === numImgs) {
                    self._raise('fileimagesresized', [undefined, undefined]);
                }
                if (!(blob instanceof Blob)) {
                    throwError(self.msgImageResizeError, params, 'fileimageresizeerror');
                }
            } catch (err) {
                counter.val++;
                if (counter.val === numImgs) {
                    self._raise('fileimagesresized', [undefined, undefined]);
                }
                msg = self.msgImageResizeException.replace('{errors}', err.message);
                throwError(msg, params, 'fileimageresizeexception');
            }
        },
        _initBrowse: function ($container) {
            var self = this, $el = self.$element;
            if (self.showBrowse) {
                self.$btnFile = $container.find('.btn-file').append($el);
            } else {
                $el.appendTo($container).attr('tabindex', -1);
                $h.addCss($el, 'file-no-browse');
            }
        },
        _initClickable: function () {
            var self = this, $zone, $tmpZone;
            if (!self.isClickable) {
                return;
            }
            $zone = self.$dropZone;
            if (!self.isAjaxUpload) {
                $tmpZone = self.$preview.find('.file-default-preview');
                if ($tmpZone.length) {
                    $zone = $tmpZone;
                }
            }

            $h.addCss($zone, 'clickable');
            $zone.attr('tabindex', -1);
            self._handler($zone, 'click', function (e) {
                var $tar = $(e.target);
                if (!$(self.elErrorContainer + ':visible').length &&
                    (!$tar.parents('.file-preview-thumbnails').length || $tar.parents(
                        '.file-default-preview').length)) {
                    self.$element.data('zoneClicked', true).trigger('click');
                    $zone.blur();
                }
            });
        },
        _initCaption: function () {
            var self = this, cap = self.initialCaption || '';
            if (self.overwriteInitial || $h.isEmpty(cap)) {
                self.$caption.val('');
                return false;
            }
            self._setCaption(cap);
            return true;
        },
        _setCaption: function (content, isError) {
            var self = this, title, out, icon, n, cap, file;
            if (!self.$caption.length) {
                return;
            }
            self.$captionContainer.removeClass('icon-visible');
            if (isError) {
                title = $('<div>' + self.msgValidationError + '</div>').text();
                n = self.fileManager.count();
                if (n) {
                    file = self.fileManager.getFirstFile();
                    cap = n === 1 && file ? file.nameFmt : self._getMsgSelected(n);
                } else {
                    cap = self._getMsgSelected(self.msgNo);
                }
                out = $h.isEmpty(content) ? cap : content;
                icon = '<span class="' + self.msgValidationErrorClass + '">' + self.msgValidationErrorIcon + '</span>';
            } else {
                if ($h.isEmpty(content)) {
                    return;
                }
                title = $('<div>' + content + '</div>').text();
                out = title;
                icon = self._getLayoutTemplate('fileIcon');
            }
            self.$captionContainer.addClass('icon-visible');
            self.$caption.attr('title', title).val(out);
            self.$captionIcon.html(icon);
        },
        _createContainer: function () {
            var self = this, attribs = {'class': 'file-input file-input-new' + (self.rtl ? ' kv-rtl' : '')},
                $container = $(document.createElement('div')).attr(attribs).html(self._renderMain());
            $container.insertBefore(self.$element);
            self._initBrowse($container);
            if (self.theme) {
                $container.addClass('theme-' + self.theme);
            }
            return $container;
        },
        _refreshContainer: function () {
            var self = this, $container = self.$container, $el = self.$element;
            $el.insertAfter($container);
            $container.html(self._renderMain());
            self._initBrowse($container);
            self._validateDisabled();
        },
        _validateDisabled: function () {
            var self = this;
            self.$caption.attr({readonly: self.isDisabled});
        },
        _renderMain: function () {
            var self = this,
                dropCss = self.dropZoneEnabled ? ' file-drop-zone' : 'file-drop-disabled',
                close = !self.showClose ? '' : self._getLayoutTemplate('close'),
                preview = !self.showPreview ? '' : self._getLayoutTemplate('preview')
                    .setTokens({'class': self.previewClass, 'dropClass': dropCss}),
                css = self.isDisabled ? self.captionClass + ' file-caption-disabled' : self.captionClass,
                caption = self.captionTemplate.setTokens({'class': css + ' kv-fileinput-caption'});
            return self.mainTemplate.setTokens({
                'class': self.mainClass + (!self.showBrowse && self.showCaption ? ' no-browse' : ''),
                'preview': preview,
                'close': close,
                'caption': caption,
                'upload': self._renderButton('upload'),
                'remove': self._renderButton('remove'),
                'cancel': self._renderButton('cancel'),
                'pause': self._renderButton('pause'),
                'browse': self._renderButton('browse')
            });

        },
        _renderButton: function (type) {
            var self = this, tmplt = self._getLayoutTemplate('btnDefault'), css = self[type + 'Class'],
                title = self[type + 'Title'], icon = self[type + 'Icon'], label = self[type + 'Label'],
                status = self.isDisabled ? ' disabled' : '', btnType = 'button';
            switch (type) {
                case 'remove':
                    if (!self.showRemove) {
                        return '';
                    }
                    break;
                case 'cancel':
                    if (!self.showCancel) {
                        return '';
                    }
                    css += ' kv-hidden';
                    break;
                case 'pause':
                    if (!self.showPause) {
                        return '';
                    }
                    css += ' kv-hidden';
                    break;
                case 'upload':
                    if (!self.showUpload) {
                        return '';
                    }
                    if (self.isAjaxUpload && !self.isDisabled) {
                        tmplt = self._getLayoutTemplate('btnLink').replace('{href}', self.uploadUrl);
                    } else {
                        btnType = 'submit';
                    }
                    break;
                case 'browse':
                    if (!self.showBrowse) {
                        return '';
                    }
                    tmplt = self._getLayoutTemplate('btnBrowse');
                    break;
                default:
                    return '';
            }

            css += type === 'browse' ? ' btn-file' : ' fileinput-' + type + ' fileinput-' + type + '-button';
            if (!$h.isEmpty(label)) {
                label = ' <span class="' + self.buttonLabelClass + '">' + label + '</span>';
            }
            return tmplt.setTokens({
                'type': btnType, 'css': css, 'title': title, 'status': status, 'icon': icon, 'label': label
            });
        },
        _renderThumbProgress: function () {
            var self = this;
            return '<div class="file-thumb-progress kv-hidden">' +
                self.progressInfoTemplate.setTokens({percent: 101, status: self.msgUploadBegin, stats: ''}) +
                '</div>';
        },
        _renderFileFooter: function (cat, caption, size, width, isError) {
            var self = this, config = self.fileActionSettings, rem = config.showRemove, drg = config.showDrag,
                upl = config.showUpload, zoom = config.showZoom, out, params,
                template = self._getLayoutTemplate('footer'), tInd = self._getLayoutTemplate('indicator'),
                ind = isError ? config.indicatorError : config.indicatorNew,
                title = isError ? config.indicatorErrorTitle : config.indicatorNewTitle,
                indicator = tInd.setTokens({'indicator': ind, 'indicatorTitle': title});
            size = self._getSize(size);
            params = {type: cat, caption: caption, size: size, width: width, progress: '', indicator: indicator};
            if (self.isAjaxUpload) {
                params.progress = self._renderThumbProgress();
                params.actions = self._renderFileActions(params, upl, false, rem, zoom, drg, false, false, false);
            } else {
                params.actions = self._renderFileActions(params, false, false, false, zoom, drg, false, false, false);
            }
            out = template.setTokens(params);
            out = $h.replaceTags(out, self.previewThumbTags);
            return out;
        },
        _renderFileActions: function (
            cfg,
            showUpl,
            showDwn,
            showDel,
            showZoom,
            showDrag,
            disabled,
            url,
            key,
            isInit,
            dUrl,
            dFile
        ) {
            var self = this;
            if (!cfg.type && isInit) {
                cfg.type = 'image';
            }
            if (self.enableResumableUpload) {
                showUpl = false;
            } else {
                if (typeof showUpl === 'function') {
                    showUpl = showUpl(cfg);
                }
            }
            if (typeof showDwn === 'function') {
                showDwn = showDwn(cfg);
            }
            if (typeof showDel === 'function') {
                showDel = showDel(cfg);
            }
            if (typeof showZoom === 'function') {
                showZoom = showZoom(cfg);
            }
            if (typeof showDrag === 'function') {
                showDrag = showDrag(cfg);
            }
            if (!showUpl && !showDwn && !showDel && !showZoom && !showDrag) {
                return '';
            }
            var vUrl = url === false ? '' : ' data-url="' + url + '"', btnZoom = '', btnDrag = '', css,
                vKey = key === false ? '' : ' data-key="' + key + '"', btnDelete = '', btnUpload = '', btnDownload = '',
                template = self._getLayoutTemplate('actions'), config = self.fileActionSettings,
                otherButtons = self.otherActionButtons.setTokens({'dataKey': vKey, 'key': key}),
                removeClass = disabled ? config.removeClass + ' disabled' : config.removeClass;
            if (showDel) {
                btnDelete = self._getLayoutTemplate('actionDelete').setTokens({
                    'removeClass': removeClass,
                    'removeIcon': config.removeIcon,
                    'removeTitle': config.removeTitle,
                    'dataUrl': vUrl,
                    'dataKey': vKey,
                    'key': key
                });
            }
            if (showUpl) {
                btnUpload = self._getLayoutTemplate('actionUpload').setTokens({
                    'uploadClass': config.uploadClass,
                    'uploadIcon': config.uploadIcon,
                    'uploadTitle': config.uploadTitle
                });
            }
            if (showDwn) {
                btnDownload = self._getLayoutTemplate('actionDownload').setTokens({
                    'downloadClass': config.downloadClass,
                    'downloadIcon': config.downloadIcon,
                    'downloadTitle': config.downloadTitle,
                    'downloadUrl': dUrl || self.initialPreviewDownloadUrl
                });
                btnDownload = btnDownload.setTokens({'filename': dFile, 'key': key});
            }
            if (showZoom) {
                btnZoom = self._getLayoutTemplate('actionZoom').setTokens({
                    'zoomClass': config.zoomClass,
                    'zoomIcon': config.zoomIcon,
                    'zoomTitle': config.zoomTitle
                });
            }
            if (showDrag && isInit) {
                css = 'drag-handle-init ' + config.dragClass;
                btnDrag = self._getLayoutTemplate('actionDrag').setTokens({
                    'dragClass': css,
                    'dragTitle': config.dragTitle,
                    'dragIcon': config.dragIcon
                });
            }
            return template.setTokens({
                'delete': btnDelete,
                'upload': btnUpload,
                'download': btnDownload,
                'zoom': btnZoom,
                'drag': btnDrag,
                'other': otherButtons
            });
        },
        _browse: function (e) {
            var self = this;
            if (e && e.isDefaultPrevented() || !self._raise('filebrowse')) {
                return;
            }
            if (self.isError && !self.isAjaxUpload) {
                self.clear();
            }
            if (self.focusCaptionOnBrowse) {
                self.$captionContainer.focus();
            }
        },
        _change: function (e) {
            var self = this;
            if (self.changeTriggered) {
                return;
            }
            var $el = self.$element, isDragDrop = arguments.length > 1, isAjaxUpload = self.isAjaxUpload,
                tfiles, files = isDragDrop ? arguments[1] : $el.get(0).files, ctr = self.fileManager.count(),
                total, initCount, len, isSingleUpl = $h.isEmpty($el.attr('multiple')),
                maxCount = !isAjaxUpload && isSingleUpl ? 1 : self.maxFileCount, maxTotCount = self.maxTotalFileCount,
                inclAll = maxTotCount > 0 && maxTotCount > maxCount, flagSingle = (isSingleUpl && ctr > 0),
                throwError = function (mesg, file, previewId, index) {
                    var p1 = $.extend(true, {}, self._getOutData(null, {}, {}, files), {id: previewId, index: index}),
                        p2 = {id: previewId, index: index, file: file, files: files};
                    return isAjaxUpload ? self._showFileError(mesg, p1) : self._showError(mesg, p2);
                },
                maxCountCheck = function (n, m, all) {
                    var msg = all ? self.msgTotalFilesTooMany : self.msgFilesTooMany;
                    msg = msg.replace('{m}', m).replace('{n}', n);
                    self.isError = throwError(msg, null, null, null);
                    self.$captionContainer.removeClass('icon-visible');
                    self._setCaption('', true);
                    self.$container.removeClass('file-input-new file-input-ajax-new');
                };
            self.reader = null;
            self._resetUpload();
            self._hideFileIcon();
            if (self.dropZoneEnabled) {
                self.$container.find('.file-drop-zone .' + self.dropZoneTitleClass).remove();
            }
            if (!isAjaxUpload) {
                if (e.target && e.target.files === undefined) {
                    files = e.target.value ? [{name: e.target.value.replace(/^.+\\/, '')}] : [];
                } else {
                    files = e.target.files || {};
                }
            }
            tfiles = files;
            if ($h.isEmpty(tfiles) || tfiles.length === 0) {
                if (!isAjaxUpload) {
                    self.clear();
                }
                self._raise('fileselectnone');
                return;
            }
            self._resetErrors();
            len = tfiles.length;
            initCount = isAjaxUpload ? (self.fileManager.count() + len) : len;
            total = self._getFileCount(initCount, inclAll ? false : undefined);
            if (maxCount > 0 && total > maxCount) {
                if (!self.autoReplace || len > maxCount) {
                    maxCountCheck((self.autoReplace && len > maxCount ? len : total), maxCount);
                    return;
                }
                if (total > maxCount) {
                    self._resetPreviewThumbs(isAjaxUpload);
                }
            } else {
                if (inclAll) {
                    total = self._getFileCount(initCount, true);
                    if (maxTotCount > 0 && total > maxTotCount) {
                        if (!self.autoReplace || len > maxCount) {
                            maxCountCheck((self.autoReplace && len > maxTotCount ? len : total), maxTotCount, true);
                            return;
                        }
                        if (total > maxCount) {
                            self._resetPreviewThumbs(isAjaxUpload);
                        }
                    }
                }
                if (!isAjaxUpload || flagSingle) {
                    self._resetPreviewThumbs(false);
                    if (flagSingle) {
                        self.clearFileStack();
                    }
                } else {
                    if (isAjaxUpload && ctr === 0 && (!self.previewCache.count(true) || self.overwriteInitial)) {
                        self._resetPreviewThumbs(true);
                    }
                }
            }
            self.readFiles(tfiles);
        },
        _abort: function (params) {
            var self = this, data;
            if (self.ajaxAborted && typeof self.ajaxAborted === 'object' && self.ajaxAborted.message !== undefined) {
                data = $.extend(true, {}, self._getOutData(null), params);
                data.abortData = self.ajaxAborted.data || {};
                data.abortMessage = self.ajaxAborted.message;
                self._setProgress(101, self.$progress, self.msgCancelled);
                self._showFileError(self.ajaxAborted.message, data, 'filecustomerror');
                self.cancel();
                return true;
            }
            return !!self.ajaxAborted;
        },
        _resetFileStack: function () {
            var self = this, i = 0;
            self._getThumbs().each(function () {
                var $thumb = $(this), ind = $thumb.attr('data-fileindex'), pid = $thumb.attr('id');
                if (ind === '-1' || ind === -1) {
                    return;
                }
                if (!self.fileManager.getFile($thumb.attr('data-fileid'))) {
                    $thumb.attr({'data-fileindex': i});
                    i++;
                } else {
                    $thumb.attr({'data-fileindex': '-1'});
                }
                self._getZoom(pid).attr({
                    'data-fileindex': $thumb.attr('data-fileindex')
                });
            });
        },
        _isFileSelectionValid: function (cnt) {
            var self = this;
            cnt = cnt || 0;
            if (self.required && !self.getFilesCount()) {
                self.$errorContainer.html('');
                self._showFileError(self.msgFileRequired);
                return false;
            }
            if (self.minFileCount > 0 && self._getFileCount(cnt) < self.minFileCount) {
                self._noFilesError({});
                return false;
            }
            return true;
        },
        _canPreview: function (file) {
            var self = this;
            if (!file || !self.showPreview || !self.$preview || !self.$preview.length) {
                return false;
            }
            var name = file.name || '', type = file.type || '', size = (file.size || 0) / 1000,
                cat = self._parseFileType(type, name), allowedTypes, allowedMimes, allowedExts, skipPreview,
                types = self.allowedPreviewTypes, mimes = self.allowedPreviewMimeTypes,
                exts = self.allowedPreviewExtensions || [], dTypes = self.disabledPreviewTypes,
                dMimes = self.disabledPreviewMimeTypes, dExts = self.disabledPreviewExtensions || [],
                maxSize = self.maxFilePreviewSize && parseFloat(self.maxFilePreviewSize) || 0,
                expAllExt = new RegExp('\\.(' + exts.join('|') + ')$', 'i'),
                expDisExt = new RegExp('\\.(' + dExts.join('|') + ')$', 'i');
            allowedTypes = !types || types.indexOf(cat) !== -1;
            allowedMimes = !mimes || mimes.indexOf(type) !== -1;
            allowedExts = !exts.length || $h.compare(name, expAllExt);
            skipPreview = (dTypes && dTypes.indexOf(cat) !== -1) || (dMimes && dMimes.indexOf(type) !== -1) ||
                (dExts.length && $h.compare(name, expDisExt)) || (maxSize && !isNaN(maxSize) && size > maxSize);
            return !skipPreview && (allowedTypes || allowedMimes || allowedExts);
        },
        addToStack: function (file, id) {
            this.fileManager.add(file, id);
        },
        clearFileStack: function () {
            var self = this;
            self.fileManager.clear();
            self._initResumableUpload();
            if (self.enableResumableUpload) {
                if (self.showPause === null) {
                    self.showPause = true;
                }
                if (self.showCancel === null) {
                    self.showCancel = false;
                }
            } else {
                self.showPause = false;
                if (self.showCancel === null) {
                    self.showCancel = true;
                }
            }
            return self.$element;
        },
        getFileStack: function () {
            return this.fileManager.stack;
        },
        getFileList: function () {
            return this.fileManager.list();
        },
        getFilesCount: function () {
            var self = this, len = self.isAjaxUpload ? self.fileManager.count() : self._inputFileCount();
            return self._getFileCount(len);
        },
        readFiles: function (files) {
            this.reader = new FileReader();
            var self = this, $el = self.$element, reader = self.reader, $container = self.$previewContainer,
                $status = self.$previewStatus, msgLoading = self.msgLoading, msgProgress = self.msgProgress,
                previewInitId = self.previewInitId, numFiles = files.length, settings = self.fileTypeSettings,
                readFile, fileTypes = self.allowedFileTypes, typLen = fileTypes ? fileTypes.length : 0,
                fileExt = self.allowedFileExtensions, strExt = $h.isEmpty(fileExt) ? '' : fileExt.join(', '),
                throwError = function (msg, file, previewId, index, fileId, removeThumb) {
                    var p1 = $.extend(true, {}, self._getOutData(null, {}, {}, files),
                        {id: previewId, index: index, fileId: fileId}), $thumb = '',
                        p2 = {id: previewId, index: index, fileId: fileId, file: file, files: files};
                    removeThumb = removeThumb || self.removeFromPreviewOnError;
                    if (!removeThumb) {
                        self._previewDefault(file, true);
                    }
                    $thumb = self._getFrame(previewId, true);
                    if (self.isAjaxUpload) {
                        setTimeout(function () {
                            readFile(index + 1);
                        }, self.processDelay);
                    } else {
                        self.unlock();
                        numFiles = 0;
                    }
                    if (removeThumb && $thumb.length) {
                        $thumb.remove();
                    } else {
                        self._initFileActions();
                        $thumb.find('.kv-file-upload').remove();
                    }
                    self.isError = self.isAjaxUpload ? self._showFileError(msg, p1) : self._showError(msg, p2);
                    self._updateFileDetails(numFiles);
                };
            self.fileManager.clearImages();
            $.each(files, function (key, file) {
                var func = self.fileTypeSettings.image;
                if (func && func(file.type)) {
                    self.fileManager.totalImages++;
                }
            });
            readFile = function (i) {
                if ($h.isEmpty($el.attr('multiple'))) {
                    numFiles = 1;
                }
                if (i >= numFiles) {
                    self.unlock();
                    if (self.isAjaxUpload && self.fileManager.count() > 0) {
                        self._raise('filebatchselected', [self.fileManager.stack]);
                    } else {
                        self._raise('filebatchselected', [files]);
                    }
                    $container.removeClass('file-thumb-loading');
                    $status.html('');
                    return;
                }
                self.lock(true);
                var file = files[i], previewId = previewInitId + '-' + self._getFileId(file), fSizeKB, j, msg,
                    fnText = settings.text, fnImage = settings.image, fnHtml = settings.html, typ, chk, typ1, typ2,
                    caption = self._getFileName(file, ''), fileSize = (file && file.size || 0) / 1000,
                    fileExtExpr = '', previewData = $h.createObjectURL(file), fileCount = 0,
                    strTypes = '', fileId,
                    func, knownTypes = 0, isText, isHtml, isImage, txtFlag, processFileLoaded = function () {
                        var msg = msgProgress.setTokens({
                            'index': i + 1,
                            'files': numFiles,
                            'percent': 50,
                            'name': caption
                        });
                        setTimeout(function () {
                            $status.html(msg);
                            self._updateFileDetails(numFiles);
                            readFile(i + 1);
                        }, self.processDelay);
                        self._raise('fileloaded', [file, previewId, i, reader]);
                    };
                if (!file) {
                    return;
                }
                fileId = self.fileManager.getId(file);
                if (typLen > 0) {
                    for (j = 0; j < typLen; j++) {
                        typ1 = fileTypes[j];
                        typ2 = self.msgFileTypes[typ1] || typ1;
                        strTypes += j === 0 ? typ2 : ', ' + typ2;
                    }
                }
                if (caption === false) {
                    readFile(i + 1);
                    return;
                }
                if (caption.length === 0) {
                    msg = self.msgInvalidFileName.replace('{name}', $h.htmlEncode($h.getFileName(file), '[unknown]'));
                    throwError(msg, file, previewId, i, fileId);
                    return;
                }
                if (!$h.isEmpty(fileExt)) {
                    fileExtExpr = new RegExp('\\.(' + fileExt.join('|') + ')$', 'i');
                }
                fSizeKB = fileSize.toFixed(2);
                if (self.isAjaxUpload && self.fileManager.exists(fileId) || self._getFrame(previewId, true).length) {
                    msg = self.msgDuplicateFile.setTokens({name: caption, size: fSizeKB});
                    throwError(msg, file, previewId, i, fileId, true);
                    if (!self.isAjaxUpload) {
                        self._clearFileInput();
                        self.reset();
                    }
                    return;
                }
                if (self.maxFileSize > 0 && fileSize > self.maxFileSize) {
                    msg = self.msgSizeTooLarge.setTokens({
                        'name': caption,
                        'size': fSizeKB,
                        'maxSize': self.maxFileSize
                    });
                    throwError(msg, file, previewId, i, fileId);
                    return;
                }
                if (self.minFileSize !== null && fileSize <= $h.getNum(self.minFileSize)) {
                    msg = self.msgSizeTooSmall.setTokens({
                        'name': caption,
                        'size': fSizeKB,
                        'minSize': self.minFileSize
                    });
                    throwError(msg, file, previewId, i, fileId);
                    return;
                }
                if (!$h.isEmpty(fileTypes) && $h.isArray(fileTypes)) {
                    for (j = 0; j < fileTypes.length; j += 1) {
                        typ = fileTypes[j];
                        func = settings[typ];
                        fileCount += !func || (typeof func !== 'function') ? 0 : (func(file.type,
                            $h.getFileName(file)) ? 1 : 0);
                    }
                    if (fileCount === 0) {
                        msg = self.msgInvalidFileType.setTokens({name: caption, types: strTypes});
                        throwError(msg, file, previewId, i, fileId);
                        return;
                    }
                }
                if (fileCount === 0 && !$h.isEmpty(fileExt) && $h.isArray(fileExt) && !$h.isEmpty(fileExtExpr)) {
                    chk = $h.compare(caption, fileExtExpr);
                    fileCount += $h.isEmpty(chk) ? 0 : chk.length;
                    if (fileCount === 0) {
                        msg = self.msgInvalidFileExtension.setTokens({name: caption, extensions: strExt});
                        throwError(msg, file, previewId, i, fileId);
                        return;
                    }
                }
                if (!self._canPreview(file)) {
                    if (self.isAjaxUpload) {
                        self.fileManager.add(file);
                    }
                    if (self.showPreview) {
                        $container.addClass('file-thumb-loading');
                        self._previewDefault(file);
                        self._initFileActions();
                    }
                    setTimeout(function () {
                        self._updateFileDetails(numFiles);
                        readFile(i + 1);
                        self._raise('fileloaded', [file, previewId, i]);
                    }, 10);
                    return;
                }
                isText = fnText(file.type, caption);
                isHtml = fnHtml(file.type, caption);
                isImage = fnImage(file.type, caption);
                $status.html(msgLoading.replace('{index}', i + 1).replace('{files}', numFiles));
                $container.addClass('file-thumb-loading');
                reader.onerror = function (evt) {
                    self._errorHandler(evt, caption);
                };
                reader.onload = function (theFile) {
                    var hex, fileInfo, uint, byte, bytes = [], contents, mime, readTextImage = function (textFlag) {
                        var newReader = new FileReader();
                        newReader.onerror = function (theFileNew) {
                            self._errorHandler(theFileNew, caption);
                        };
                        newReader.onload = function (theFileNew) {
                            self._previewFile(i, file, theFileNew, previewData, fileInfo);
                            self._initFileActions();
                            processFileLoaded();
                        };
                        if (textFlag) {
                            newReader.readAsText(file, self.textEncoding);
                        } else {
                            newReader.readAsDataURL(file);
                        }
                    };
                    fileInfo = {'name': caption, 'type': file.type};
                    $.each(settings, function (k, f) {
                        if (k !== 'object' && k !== 'other' && typeof f === 'function' && f(file.type, caption)) {
                            knownTypes++;
                        }
                    });
                    if (knownTypes === 0) {// auto detect mime types from content if no known file types detected
                        uint = new Uint8Array(theFile.target.result);
                        for (j = 0; j < uint.length; j++) {
                            byte = uint[j].toString(16);
                            bytes.push(byte);
                        }
                        hex = bytes.join('').toLowerCase().substring(0, 8);
                        mime = $h.getMimeType(hex, '', '');
                        if ($h.isEmpty(mime)) { // look for ascii text content
                            contents = $h.arrayBuffer2String(reader.result);
                            mime = $h.isSvg(contents) ? 'image/svg+xml' : $h.getMimeType(hex, contents, file.type);
                        }
                        fileInfo = {'name': caption, 'type': mime};
                        isText = fnText(mime, '');
                        isHtml = fnHtml(mime, '');
                        isImage = fnImage(mime, '');
                        txtFlag = isText || isHtml;
                        if (txtFlag || isImage) {
                            readTextImage(txtFlag);
                            return;
                        }
                    }
                    self._previewFile(i, file, theFile, previewData, fileInfo);
                    self._initFileActions();
                    processFileLoaded();
                };
                reader.onprogress = function (data) {
                    if (data.lengthComputable) {
                        var fact = (data.loaded / data.total) * 100, progress = Math.ceil(fact);
                        msg = msgProgress.setTokens({
                            'index': i + 1,
                            'files': numFiles,
                            'percent': progress,
                            'name': caption
                        });
                        setTimeout(function () {
                            $status.html(msg);
                        }, self.processDelay);
                    }
                };

                if (isText || isHtml) {
                    reader.readAsText(file, self.textEncoding);
                } else {
                    if (isImage) {
                        reader.readAsDataURL(file);
                    } else {
                        reader.readAsArrayBuffer(file);
                    }
                }
                self.fileManager.add(file);
            };

            readFile(0);
            self._updateFileDetails(numFiles, false);
        },
        lock: function (selectMode) {
            var self = this, $container = self.$container;
            self._resetErrors();
            self.disable();
            $container.addClass('is-locked');
            if (!selectMode && self.showCancel) {
                $container.find('.fileinput-cancel').show();
            }
            if (!selectMode && self.showPause) {
                $container.find('.fileinput-pause').show();
            }
            self._raise('filelock', [self.fileManager.stack, self._getExtraData()]);
            return self.$element;
        },
        unlock: function (reset) {
            var self = this, $container = self.$container;
            if (reset === undefined) {
                reset = true;
            }
            self.enable();
            $container.removeClass('is-locked');
            if (self.showCancel) {
                $container.find('.fileinput-cancel').hide();
            }
            if (self.showPause) {
                $container.find('.fileinput-pause').hide();
            }
            if (reset) {
                self._resetFileStack();
            }
            self._raise('fileunlock', [self.fileManager.stack, self._getExtraData()]);
            return self.$element;
        },
        resume: function () {
            var self = this, flag = false, $pr = self.$progress, rm = self.resumableManager;
            if (!self.enableResumableUpload) {
                return self.$element;
            }
            if (self.paused) {
                $pr.html(self.progressPauseTemplate.setTokens({
                    percent: 101,
                    status: self.msgUploadResume,
                    stats: ''
                }));
            } else {
                flag = true;
            }
            self.paused = false;
            if (flag) {
                $pr.html(self.progressInfoTemplate.setTokens({
                    percent: 101,
                    status: self.msgUploadBegin,
                    stats: ''
                }));
            }
            setTimeout(function () {
                rm.upload();
            }, self.processDelay);
            return self.$element;
        },
        pause: function () {
            var self = this, rm = self.resumableManager, xhr = self.ajaxRequests, len = xhr.length, i,
                pct = rm.getProgress(), actions = self.fileActionSettings;
            if (!self.enableResumableUpload) {
                return self.$element;
            }
            if (rm.chunkIntervalId) {
                clearInterval(rm.chunkIntervalId);
            }
            if (self.ajaxQueueIntervalId) {
                clearInterval(self.ajaxQueueIntervalId);
            }
            self._raise('fileuploadpaused', [self.fileManager, rm]);
            if (len > 0) {
                for (i = 0; i < len; i += 1) {
                    self.paused = true;
                    xhr[i].abort();
                }
            }
            if (self.showPreview) {
                self._getThumbs().each(function () {
                    var $thumb = $(this), fileId = $thumb.attr('data-fileid'), t = self._getLayoutTemplate('stats'),
                        stats, $indicator = $thumb.find('.file-upload-indicator');
                    $thumb.removeClass('file-uploading');
                    if ($indicator.attr('title') === actions.indicatorLoadingTitle) {
                        self._setThumbStatus($thumb, 'Paused');
                        stats = t.setTokens({pendingTime: self.msgPaused, uploadSpeed: ''});
                        self.paused = true;
                        self._setProgress(pct, $thumb.find('.file-thumb-progress'), pct + '%', stats);
                    }
                    if (!self.fileManager.getFile(fileId)) {
                        $thumb.find('.kv-file-remove').removeClass('disabled').removeAttr('disabled');
                    }
                });
            }
            self._setProgress(101, self.$progress, self.msgPaused);
            return self.$element;
        },
        cancel: function () {
            var self = this, xhr = self.ajaxRequests, rm = self.resumableManager, len = xhr.length, i;
            if (self.enableResumableUpload && rm.chunkIntervalId) {
                clearInterval(rm.chunkIntervalId);
                rm.reset();
                self._raise('fileuploadcancelled', [self.fileManager, rm]);
            } else {
                self._raise('fileuploadcancelled', [self.fileManager]);
            }
            if (self.ajaxQueueIntervalId) {
                clearInterval(self.ajaxQueueIntervalId);
            }
            self._initAjax();
            if (len > 0) {
                for (i = 0; i < len; i += 1) {
                    self.cancelling = true;
                    xhr[i].abort();
                }
            }
            self._getThumbs().each(function () {
                var $thumb = $(this), fileId = $thumb.attr('data-fileid'), $prog = $thumb.find('.file-thumb-progress');
                $thumb.removeClass('file-uploading');
                self._setProgress(0, $prog);
                $prog.hide();
                if (!self.fileManager.getFile(fileId)) {
                    $thumb.find('.kv-file-upload').removeClass('disabled').removeAttr('disabled');
                    $thumb.find('.kv-file-remove').removeClass('disabled').removeAttr('disabled');
                }
                self.unlock();
            });
            setTimeout(function () {
                self._setProgressCancelled();
            }, self.processDelay);
            return self.$element;
        },
        clear: function () {
            var self = this, cap;
            if (!self._raise('fileclear')) {
                return;
            }
            self.$btnUpload.removeAttr('disabled');
            self._getThumbs().find('video,audio,img').each(function () {
                $h.cleanMemory($(this));
            });
            self._clearFileInput();
            self._resetUpload();
            self.clearFileStack();
            self._resetErrors(true);
            if (self._hasInitialPreview()) {
                self._showFileIcon();
                self._resetPreview();
                self._initPreviewActions();
                self.$container.removeClass('file-input-new');
            } else {
                self._getThumbs().each(function () {
                    self._clearObjects($(this));
                });
                if (self.isAjaxUpload) {
                    self.previewCache.data = {};
                }
                self.$preview.html('');
                cap = (!self.overwriteInitial && self.initialCaption.length > 0) ? self.initialCaption : '';
                self.$caption.attr('title', '').val(cap);
                $h.addCss(self.$container, 'file-input-new');
                self._validateDefaultPreview();
            }
            if (self.$container.find($h.FRAMES).length === 0) {
                if (!self._initCaption()) {
                    self.$captionContainer.removeClass('icon-visible');
                }
            }
            self._hideFileIcon();
            if (self.focusCaptionOnClear) {
                self.$captionContainer.focus();
            }
            self._setFileDropZoneTitle();
            self._raise('filecleared');
            return self.$element;
        },
        reset: function () {
            var self = this;
            if (!self._raise('filereset')) {
                return;
            }
            self.lastProgress = 0;
            self._resetPreview();
            self.$container.find('.fileinput-filename').text('');
            $h.addCss(self.$container, 'file-input-new');
            if (self.getFrames().length || self.dropZoneEnabled) {
                self.$container.removeClass('file-input-new');
            }
            self.clearFileStack();
            self._setFileDropZoneTitle();
            return self.$element;
        },
        disable: function () {
            var self = this;
            self.isDisabled = true;
            self._raise('filedisabled');
            self.$element.attr('disabled', 'disabled');
            self.$container.find('.kv-fileinput-caption').addClass('file-caption-disabled');
            self.$container.find('.fileinput-remove, .fileinput-upload, .file-preview-frame button')
                .attr('disabled', true);
            $h.addCss(self.$container.find('.btn-file'), 'disabled');
            self._initDragDrop();
            return self.$element;
        },
        enable: function () {
            var self = this;
            self.isDisabled = false;
            self._raise('fileenabled');
            self.$element.removeAttr('disabled');
            self.$container.find('.kv-fileinput-caption').removeClass('file-caption-disabled');
            self.$container.find('.fileinput-remove, .fileinput-upload, .file-preview-frame button')
                .removeAttr('disabled');
            self.$container.find('.btn-file').removeClass('disabled');
            self._initDragDrop();
            return self.$element;
        },
        upload: function () {
            var self = this, fm = self.fileManager, totLen = fm.count(), i, outData,
                hasExtraData = !$.isEmptyObject(self._getExtraData());
            if (!self.isAjaxUpload || self.isDisabled || !self._isFileSelectionValid(totLen)) {
                return;
            }
            self.lastProgress = 0;
            self._resetUpload();
            if (totLen === 0 && !hasExtraData) {
                self._showFileError(self.msgUploadEmpty);
                return;
            }
            self.cancelling = false;
            self.$progress.show();
            self.lock();
            if (totLen === 0 && hasExtraData) {
                self._setProgress(2);
                self._uploadExtraOnly();
                return;
            }
            if (self.enableResumableUpload) {
                return self.resume();
            }
            if (self.uploadAsync || self.enableResumableUpload) {
                outData = self._getOutData(null);
                self._raise('filebatchpreupload', [outData]);
                self.fileBatchCompleted = false;
                self.uploadCache = [];
                $.each(self.getFileStack(), function (id) {
                    var previewId = self._getThumbId(id);
                    self.uploadCache.push({id: previewId, content: null, config: null, tags: null, append: true});
                });
                self.$preview.find('.file-preview-initial').removeClass($h.SORT_CSS);
                self._initSortable();
            }
            self._setProgress(2);
            self.hasInitData = false;
            if (self.uploadAsync) {
                i = 0;
                $.each(fm.stack, function (id) {
                    self._uploadSingle(i, id, true);
                    i++;
                });
                return;
            }
            self._uploadBatch();
            return self.$element;
        },
        destroy: function () {
            var self = this, $form = self.$form, $cont = self.$container, $el = self.$element, ns = self.namespace;
            $(document).off(ns);
            $(window).off(ns);
            if ($form && $form.length) {
                $form.off(ns);
            }
            if (self.isAjaxUpload) {
                self._clearFileInput();
            }
            self._cleanup();
            self._initPreviewCache();
            $el.insertBefore($cont).off(ns).removeData();
            $cont.off().remove();
            return $el;
        },
        refresh: function (options) {
            var self = this, $el = self.$element;
            if (typeof options !== 'object' || $h.isEmpty(options)) {
                options = self.options;
            } else {
                options = $.extend(true, {}, self.options, options);
            }
            self._init(options, true);
            self._listen();
            return $el;
        },
        zoom: function (frameId) {
            var self = this, $frame = self._getFrame(frameId), $modal = self.$modal;
            if (!$frame) {
                return;
            }
            $h.initModal($modal);
            $modal.html(self._getModalContent());
            self._setZoomContent($frame);
            $modal.modal('show');
            self._initZoomButtons();
        },
        getExif: function (frameId) {
            var self = this, $frame = self._getFrame(frameId);
            return $frame && $frame.data('exif') || null;
        },
        getFrames: function (cssFilter) {
            var self = this, $frames;
            cssFilter = cssFilter || '';
            $frames = self.$preview.find($h.FRAMES + cssFilter);
            if (self.reversePreviewOrder) {
                $frames = $($frames.get().reverse());
            }
            return $frames;
        },
        getPreview: function () {
            var self = this;
            return {
                content: self.initialPreview,
                config: self.initialPreviewConfig,
                tags: self.initialPreviewThumbTags
            };
        }
    };

    $.fn.fileinput = function (option) {
        if (!$h.hasFileAPISupport() && !$h.isIE(9)) {
            return;
        }
        var args = Array.apply(null, arguments), retvals = [];
        args.shift();
        this.each(function () {
            var self = $(this), data = self.data('fileinput'), options = typeof option === 'object' && option,
                theme = options.theme || self.data('theme'), l = {}, t = {},
                lang = options.language || self.data('language') || $.fn.fileinput.defaults.language || 'en', opt;
            if (!data) {
                if (theme) {
                    t = $.fn.fileinputThemes[theme] || {};
                }
                if (lang !== 'en' && !$h.isEmpty($.fn.fileinputLocales[lang])) {
                    l = $.fn.fileinputLocales[lang] || {};
                }
                opt = $.extend(true, {}, $.fn.fileinput.defaults, t, $.fn.fileinputLocales.en, l, options, self.data());
                data = new FileInput(this, opt);
                self.data('fileinput', data);
            }

            if (typeof option === 'string') {
                retvals.push(data[option].apply(data, args));
            }
        });
        switch (retvals.length) {
            case 0:
                return this;
            case 1:
                return retvals[0];
            default:
                return retvals;
        }
    };

    //noinspection HtmlUnknownAttribute
    $.fn.fileinput.defaults = {
        language: 'en',
        showCaption: true,
        showBrowse: true,
        showPreview: true,
        showRemove: true,
        showUpload: true,
        showUploadStats: true,
        showCancel: null,
        showPause: null,
        showClose: true,
        showUploadedThumbs: true,
        showConsoleLogs: true,
        browseOnZoneClick: false,
        autoReplace: false,
        autoOrientImage: function () { // applicable for JPEG images only and non ios safari
            var ua = window.navigator.userAgent, webkit = !!ua.match(/WebKit/i),
                iOS = !!ua.match(/iP(od|ad|hone)/i), iOSSafari = iOS && webkit && !ua.match(/CriOS/i);
            return !iOSSafari;
        },
        autoOrientImageInitial: true,
        required: false,
        rtl: false,
        hideThumbnailContent: false,
        encodeUrl: true,
        focusCaptionOnBrowse: true,
        focusCaptionOnClear: true,
        generateFileId: null,
        previewClass: '',
        captionClass: '',
        frameClass: 'krajee-default',
        mainClass: 'file-caption-main',
        mainTemplate: null,
        purifyHtml: true,
        fileSizeGetter: null,
        initialCaption: '',
        initialPreview: [],
        initialPreviewDelimiter: '*$$*',
        initialPreviewAsData: false,
        initialPreviewFileType: 'image',
        initialPreviewConfig: [],
        initialPreviewThumbTags: [],
        previewThumbTags: {},
        initialPreviewShowDelete: true,
        initialPreviewDownloadUrl: '',
        removeFromPreviewOnError: false,
        deleteUrl: '',
        deleteExtraData: {},
        overwriteInitial: true,
        sanitizeZoomCache: function (content) {
            var $container = $(document.createElement('div')).append(content);
            $container.find('input,select,.file-thumbnail-footer').remove();
            return $container.html();
        },
        previewZoomButtonIcons: {
            prev: '<i class="glyphicon glyphicon-triangle-left"></i>',
            next: '<i class="glyphicon glyphicon-triangle-right"></i>',
            toggleheader: '<i class="glyphicon glyphicon-resize-vertical"></i>',
            fullscreen: '<i class="glyphicon glyphicon-fullscreen"></i>',
            borderless: '<i class="glyphicon glyphicon-resize-full"></i>',
            close: '<i class="glyphicon glyphicon-remove"></i>'
        },
        previewZoomButtonClasses: {
            prev: 'btn btn-navigate',
            next: 'btn btn-navigate',
            toggleheader: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
            fullscreen: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
            borderless: 'btn btn-sm btn-kv btn-default btn-outline-secondary',
            close: 'btn btn-sm btn-kv btn-default btn-outline-secondary'
        },
        previewTemplates: {},
        previewContentTemplates: {},
        preferIconicPreview: false,
        preferIconicZoomPreview: false,
        allowedFileTypes: null,
        allowedFileExtensions: null,
        allowedPreviewTypes: undefined,
        allowedPreviewMimeTypes: null,
        allowedPreviewExtensions: null,
        disabledPreviewTypes: undefined,
        disabledPreviewExtensions: ['msi', 'exe', 'com', 'zip', 'rar', 'app', 'vb', 'scr'],
        disabledPreviewMimeTypes: null,
        defaultPreviewContent: null,
        customLayoutTags: {},
        customPreviewTags: {},
        previewFileIcon: '<i class="glyphicon glyphicon-file"></i>',
        previewFileIconClass: 'file-other-icon',
        previewFileIconSettings: {},
        previewFileExtSettings: {},
        buttonLabelClass: 'hidden-xs',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>&nbsp;',
        browseClass: 'btn btn-primary',
        removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
        removeClass: 'btn btn-default btn-secondary',
        cancelIcon: '<i class="glyphicon glyphicon-ban-circle"></i>',
        cancelClass: 'btn btn-default btn-secondary',
        pauseIcon: '<i class="glyphicon glyphicon-pause"></i>',
        pauseClass: 'btn btn-default btn-secondary',
        uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
        uploadClass: 'btn btn-default btn-secondary',
        uploadUrl: null,
        uploadUrlThumb: null,
        uploadAsync: true,
        uploadParamNames: {
            chunkCount: 'chunkCount',
            chunkIndex: 'chunkIndex',
            chunkSize: 'chunkSize',
            chunkSizeStart: 'chunkSizeStart',
            chunksUploaded: 'chunksUploaded',
            fileBlob: 'fileBlob',
            fileId: 'fileId',
            fileName: 'fileName',
            fileRelativePath: 'fileRelativePath',
            fileSize: 'fileSize',
            retryCount: 'retryCount'
        },
        maxAjaxThreads: 5,
        processDelay: 100,
        queueDelay: 10, // must be lesser than process delay
        progressDelay: 0, // must be lesser than process delay
        enableResumableUpload: false,
        resumableUploadOptions: {
            fallback: null,
            testUrl: null, // used for checking status of chunks/ files previously / partially uploaded
            chunkSize: 2 * 1024, // in KB
            maxThreads: 4,
            maxRetries: 3,
            showErrorLog: true
        },
        uploadExtraData: {},
        zoomModalHeight: 480,
        minImageWidth: null,
        minImageHeight: null,
        maxImageWidth: null,
        maxImageHeight: null,
        resizeImage: false,
        resizePreference: 'width',
        resizeQuality: 0.92,
        resizeDefaultImageType: 'image/jpeg',
        resizeIfSizeMoreThan: 0, // in KB
        minFileSize: 0,
        maxFileSize: 0,
        maxFilePreviewSize: 25600, // 25 MB
        minFileCount: 0,
        maxFileCount: 0,
        maxTotalFileCount: 0,
        validateInitialCount: false,
        msgValidationErrorClass: 'text-danger',
        msgValidationErrorIcon: '<i class="glyphicon glyphicon-exclamation-sign"></i> ',
        msgErrorClass: 'file-error-message',
        progressThumbClass: 'progress-bar progress-bar-striped active',
        progressClass: 'progress-bar bg-success progress-bar-success progress-bar-striped active',
        progressInfoClass: 'progress-bar bg-info progress-bar-info progress-bar-striped active',
        progressCompleteClass: 'progress-bar bg-success progress-bar-success',
        progressPauseClass: 'progress-bar bg-primary progress-bar-primary progress-bar-striped active',
        progressErrorClass: 'progress-bar bg-danger progress-bar-danger',
        progressUploadThreshold: 99,
        previewFileType: 'image',
        elCaptionContainer: null,
        elCaptionText: null,
        elPreviewContainer: null,
        elPreviewImage: null,
        elPreviewStatus: null,
        elErrorContainer: null,
        errorCloseButton: $h.closeButton('kv-error-close'),
        slugCallback: null,
        dropZoneEnabled: true,
        dropZoneTitleClass: 'file-drop-zone-title',
        fileActionSettings: {},
        otherActionButtons: '',
        textEncoding: 'UTF-8',
        ajaxSettings: {},
        ajaxDeleteSettings: {},
        showAjaxErrorDetails: true,
        mergeAjaxCallbacks: false,
        mergeAjaxDeleteCallbacks: false,
        retryErrorUploads: true,
        reversePreviewOrder: false,
        usePdfRenderer: function () {
            //noinspection JSUnresolvedVariable
            var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
            return !!navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/i) || isIE11;
        },
        pdfRendererUrl: '',
        pdfRendererTemplate: '<iframe class="kv-preview-data file-preview-pdf" src="{renderer}?file={data}" {style}></iframe>'
    };

    // noinspection HtmlUnknownAttribute
    $.fn.fileinputLocales.en = {
        fileSingle: 'file',
        filePlural: 'files',
        browseLabel: 'Browse &hellip;',
        removeLabel: 'Remove',
        removeTitle: 'Clear all unprocessed files',
        cancelLabel: 'Cancel',
        cancelTitle: 'Abort ongoing upload',
        pauseLabel: 'Pause',
        pauseTitle: 'Pause ongoing upload',
        uploadLabel: 'Upload',
        uploadTitle: 'Upload selected files',
        msgNo: 'No',
        msgNoFilesSelected: 'No files selected',
        msgCancelled: 'Cancelled',
        msgPaused: 'Paused',
        msgPlaceholder: 'Select {files}...',
        msgZoomModalHeading: 'Detailed Preview',
        msgFileRequired: 'You must select a file to upload.',
        msgSizeTooSmall: 'File "{name}" (<b>{size} KB</b>) is too small and must be larger than <b>{minSize} KB</b>.',
        msgSizeTooLarge: 'File "{name}" (<b>{size} KB</b>) exceeds maximum allowed upload size of <b>{maxSize} KB</b>.',
        msgFilesTooLess: 'You must select at least <b>{n}</b> {files} to upload.',
        msgFilesTooMany: 'Number of files selected for upload <b>({n})</b> exceeds maximum allowed limit of <b>{m}</b>.',
        msgTotalFilesTooMany: 'You can upload a maximum of <b>{m}</b> files (<b>{n}</b> files detected).',
        msgFileNotFound: 'File "{name}" not found!',
        msgFileSecured: 'Security restrictions prevent reading the file "{name}".',
        msgFileNotReadable: 'File "{name}" is not readable.',
        msgFilePreviewAborted: 'File preview aborted for "{name}".',
        msgFilePreviewError: 'An error occurred while reading the file "{name}".',
        msgInvalidFileName: 'Invalid or unsupported characters in file name "{name}".',
        msgInvalidFileType: 'Invalid type for file "{name}". Only "{types}" files are supported.',
        msgInvalidFileExtension: 'Invalid extension for file "{name}". Only "{extensions}" files are supported.',
        msgFileTypes: {
            'image': 'image',
            'html': 'HTML',
            'text': 'text',
            'video': 'video',
            'audio': 'audio',
            'flash': 'flash',
            'pdf': 'PDF',
            'object': 'object'
        },
        msgUploadAborted: 'The file upload was aborted',
        msgUploadThreshold: 'Processing...',
        msgUploadBegin: 'Initializing...',
        msgUploadEnd: 'Done',
        msgUploadResume: 'Resuming upload...',
        msgUploadEmpty: 'No valid data available for upload.',
        msgUploadError: 'Upload Error',
        msgDeleteError: 'Delete Error',
        msgProgressError: 'Error',
        msgValidationError: 'Validation Error',
        msgLoading: 'Loading file {index} of {files} &hellip;',
        msgProgress: 'Loading file {index} of {files} - {name} - {percent}% completed.',
        msgSelected: '{n} {files} selected',
        msgFoldersNotAllowed: 'Drag & drop files only! {n} folder(s) dropped were skipped.',
        msgImageWidthSmall: 'Width of image file "{name}" must be at least {size} px.',
        msgImageHeightSmall: 'Height of image file "{name}" must be at least {size} px.',
        msgImageWidthLarge: 'Width of image file "{name}" cannot exceed {size} px.',
        msgImageHeightLarge: 'Height of image file "{name}" cannot exceed {size} px.',
        msgImageResizeError: 'Could not get the image dimensions to resize.',
        msgImageResizeException: 'Error while resizing the image.<pre>{errors}</pre>',
        msgAjaxError: 'Something went wrong with the {operation} operation. Please try again later!',
        msgAjaxProgressError: '{operation} failed',
        msgDuplicateFile: 'File "{name}" of same size "{size} KB" has already been selected earlier. Skipping duplicate selection.',
        msgResumableUploadRetriesExceeded: 'Upload aborted beyond <b>{max}</b> retries for file <b>{file}</b>! Error Details: <pre>{error}</pre>',
        msgPendingTime: '{time} remaining',
        msgCalculatingTime: 'calculating time remaining',
        ajaxOperations: {
            deleteThumb: 'file delete',
            uploadThumb: 'file upload',
            uploadBatch: 'batch file upload',
            uploadExtra: 'form data upload'
        },
        dropZoneTitle: 'Drag & drop files here &hellip;',
        dropZoneClickTitle: '<br>(or click to select {files})',
        previewZoomButtonTitles: {
            prev: 'View previous file',
            next: 'View next file',
            toggleheader: 'Toggle header',
            fullscreen: 'Toggle full screen',
            borderless: 'Toggle borderless mode',
            close: 'Close detailed preview'
        }
    };

    $.fn.fileinput.Constructor = FileInput;

    /**
     * Convert automatically file inputs with class 'file' into a bootstrap fileinput control.
     */
    $(document).ready(function () {
        var $input = $('input.file[type=file]');
        if ($input.length) {
            $input.fileinput();
        }
    });
}));

/*!
 * FileInput Thai Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";

    $.fn.fileinputLocales['th'] = {
        fileSingle: 'ไฟล์',
        filePlural: 'ไฟล์',
        browseLabel: 'เลือกดู &hellip;',
        removeLabel: 'ลบทิ้ง',
        removeTitle: 'ลบไฟล์ที่เลือกทิ้ง',
        cancelLabel: 'ยกเลิก',
        cancelTitle: 'ยกเลิกการอัพโหลด',
        pauseLabel: 'Pause',
        pauseTitle: 'Pause ongoing upload',
        uploadLabel: 'อัพโหลด',
        uploadTitle: 'อัพโหลดไฟล์ที่เลือก',
        msgNo: 'ไม่',
        msgNoFilesSelected: '',
        msgPaused: 'Paused',
        msgCancelled: 'ยกเลิก',
        msgPlaceholder: 'Select {files}...',
        msgZoomModalHeading: 'ตัวอย่างละเอียด',
        msgFileRequired: 'You must select a file to upload.',
        msgSizeTooSmall: 'File "{name}" (<b>{size} KB</b>) is too small and must be larger than <b>{minSize} KB</b>.',
        msgSizeTooLarge: 'ไฟล์ "{name}" (<b>{size} KB</b>) มีขนาดเกินที่ระบบอนุญาตที่ <b>{maxSize} KB</b>, กรุณาลองใหม่อีกครั้ง!',
        msgFilesTooLess: 'คุณต้องเลือกไฟล์จำนวนอย่างน้อย <b>{n}</b> {files} เพื่ออัพโหลด, กรุณาลองใหม่อีกครั้ง!',
        msgFilesTooMany: 'ไฟล์ที่คุณเลือกมีจำนวน <b>({n})</b> ซึ่งเกินกว่าที่ระบบอนุญาตที่ <b>{m}</b>, กรุณาลองใหม่อีกครั้ง!',
        msgTotalFilesTooMany: 'You can upload a maximum of <b>{m}</b> files (<b>{n}</b> files detected).',
        msgFileNotFound: 'ไม่พบไฟล์ "{name}" !',
        msgFileSecured: 'ระบบความปลอดภัยไม่อนุญาตให้อ่านไฟล์ "{name}".',
        msgFileNotReadable: 'ไม่สามารถอ่านไฟล์ "{name}" ได้',
        msgFilePreviewAborted: 'ไฟล์ "{name}" ไม่อนุญาตให้ดูตัวอย่าง',
        msgFilePreviewError: 'พบปัญหาในการดูตัวอย่างไฟล์ "{name}".',
        msgInvalidFileName: 'Invalid or unsupported characters in file name "{name}".',
        msgInvalidFileType: 'ไฟล์ "{name}" เป็นประเภทไฟล์ที่ไม่ถูกต้อง, อนุญาตเฉพาะไฟล์ประเภท "{types}"',
        msgInvalidFileExtension: 'ไฟล์ "{name}" เป็น extension ที่ไมถูกต้อง, อนุญาตเฉพาะไฟล์ extension "{extensions}"',
        msgFileTypes: {
            'image': 'image',
            'html': 'HTML',
            'text': 'text',
            'video': 'video',
            'audio': 'audio',
            'flash': 'flash',
            'pdf': 'PDF',
            'object': 'object'
        },
        msgUploadAborted: 'อัปโหลดไฟล์ถูกยกเลิก',
        msgUploadThreshold: 'Processing...',
        msgUploadBegin: 'Initializing...',
        msgUploadEnd: 'Done',
        msgUploadResume: 'Resuming upload...',
        msgUploadEmpty: 'No valid data available for upload.',
        msgUploadError: 'Upload Error',
        msgDeleteError: 'Delete Error',
        msgProgressError: 'Error',
        msgValidationError: 'ข้อผิดพลาดในการตรวจสอบ',
        msgLoading: 'กำลังโหลดไฟล์ {index} จาก {files} &hellip;',
        msgProgress: 'กำลังโหลดไฟล์ {index} จาก {files} - {name} - {percent}%',
        msgSelected: '{n} {files} ถูกเลือก',
        msgFoldersNotAllowed: 'Drag & drop เฉพาะไฟล์เท่านั้น! ข้าม dropped folder จำนวน {n}',
        msgImageWidthSmall: 'ความกว้างของภาพไฟล์ "{name}" ต้องมีอย่างน้อย {size} px.',
        msgImageHeightSmall: 'ความสูงของภาพไฟล์ "{name}" ต้องมีอย่างน้อย {size} px.',
        msgImageWidthLarge: 'ความกว้างของภาพไฟล์ "{name}" ไม่เกิน {size} พิกเซล.',
        msgImageHeightLarge: 'ความสูงของไฟล์ภาพ "{name}" ไม่เกิน {size} พิกเซล.',
        msgImageResizeError: 'ไม่สามารถรับขนาดภาพเพื่อปรับขนาด',
        msgImageResizeException: 'ข้อผิดพลาดขณะปรับขนาดภาพ<pre>{errors}</pre>',
        msgAjaxError: 'Something went wrong with the {operation} operation. Please try again later!',
        msgAjaxProgressError: '{operation} failed',
        msgDuplicateFile: 'File "{name}" of same size "{size} KB" has already been selected earlier. Skipping duplicate selection.',
        msgResumableUploadRetriesExceeded:  'Upload aborted beyond <b>{max}</b> retries for file <b>{file}</b>! Error Details: <pre>{error}</pre>',
        msgPendingTime: '{time} remaining',
        msgCalculatingTime: 'calculating time remaining',
        ajaxOperations: {
            deleteThumb: 'file delete',
            uploadThumb: 'file upload',
            uploadBatch: 'batch file upload',
            uploadExtra: 'form data upload'
        },
        dropZoneTitle: 'Drag & drop ไฟล์ตรงนี้ &hellip;',
        dropZoneClickTitle: '<br>(or click to select {files})',
        fileActionSettings: {
            removeTitle: 'ลบไฟล์',
            uploadTitle: 'อัปโหลดไฟล์',
            uploadRetryTitle: 'Retry upload',
            downloadTitle: 'Download file',
            zoomTitle: 'ดูรายละเอียด',
            dragTitle: 'Move / Rearrange',
            indicatorNewTitle: 'ยังไม่ได้อัปโหลด',
            indicatorSuccessTitle: 'อัพโหลด',
            indicatorErrorTitle: 'อัปโหลดข้อผิดพลาด',
            indicatorPausedTitle: 'Upload Paused',
            indicatorLoadingTitle:  'อัพโหลด ...'
        },
        previewZoomButtonTitles: {
            prev: 'View previous file',
            next: 'View next file',
            toggleheader: 'Toggle header',
            fullscreen: 'Toggle full screen',
            borderless: 'Toggle borderless mode',
            close: 'Close detailed preview'
        }
    };
})(window.jQuery);
/* piexifjs

The MIT License (MIT)

Copyright (c) 2014, 2015 hMatoba(https://github.com/hMatoba)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

(function () {
    "use strict";
    var that = {};
    that.version = "1.03";

    that.remove = function (jpeg) {
        var b64 = false;
        if (jpeg.slice(0, 2) == "\xff\xd8") {
        } else if (jpeg.slice(0, 23) == "data:image/jpeg;base64," || jpeg.slice(0, 22) == "data:image/jpg;base64,") {
            jpeg = atob(jpeg.split(",")[1]);
            b64 = true;
        } else {
            throw ("Given data is not jpeg.");
        }
        
        var segments = splitIntoSegments(jpeg);
        if (segments[1].slice(0, 2) == "\xff\xe1" && 
               segments[1].slice(4, 10) == "Exif\x00\x00") {
            segments = [segments[0]].concat(segments.slice(2));
        } else if (segments[2].slice(0, 2) == "\xff\xe1" &&
                   segments[2].slice(4, 10) == "Exif\x00\x00") {
            segments = segments.slice(0, 2).concat(segments.slice(3));
        } else {
            throw("Exif not found.");
        }
        
        var new_data = segments.join("");
        if (b64) {
            new_data = "data:image/jpeg;base64," + btoa(new_data);
        }

        return new_data;
    };


    that.insert = function (exif, jpeg) {
        var b64 = false;
        if (exif.slice(0, 6) != "\x45\x78\x69\x66\x00\x00") {
            throw ("Given data is not exif.");
        }
        if (jpeg.slice(0, 2) == "\xff\xd8") {
        } else if (jpeg.slice(0, 23) == "data:image/jpeg;base64," || jpeg.slice(0, 22) == "data:image/jpg;base64,") {
            jpeg = atob(jpeg.split(",")[1]);
            b64 = true;
        } else {
            throw ("Given data is not jpeg.");
        }

        var exifStr = "\xff\xe1" + pack(">H", [exif.length + 2]) + exif;
        var segments = splitIntoSegments(jpeg);
        var new_data = mergeSegments(segments, exifStr);
        if (b64) {
            new_data = "data:image/jpeg;base64," + btoa(new_data);
        }

        return new_data;
    };


    that.load = function (data) {
        var input_data;
        if (typeof (data) == "string") {
            if (data.slice(0, 2) == "\xff\xd8") {
                input_data = data;
            } else if (data.slice(0, 23) == "data:image/jpeg;base64," || data.slice(0, 22) == "data:image/jpg;base64,") {
                input_data = atob(data.split(",")[1]);
            } else if (data.slice(0, 4) == "Exif") {
                input_data = data.slice(6);
            } else {
                throw ("'load' gots invalid file data.");
            }
        } else {
            throw ("'load' gots invalid type argument.");
        }

        var exifDict = {};
        var exif_dict = {
            "0th": {},
            "Exif": {},
            "GPS": {},
            "Interop": {},
            "1st": {},
            "thumbnail": null
        };
        var exifReader = new ExifReader(input_data);
        if (exifReader.tiftag === null) {
            return exif_dict;
        }

        if (exifReader.tiftag.slice(0, 2) == "\x49\x49") {
            exifReader.endian_mark = "<";
        } else {
            exifReader.endian_mark = ">";
        }

        var pointer = unpack(exifReader.endian_mark + "L",
            exifReader.tiftag.slice(4, 8))[0];
        exif_dict["0th"] = exifReader.get_ifd(pointer, "0th");

        var first_ifd_pointer = exif_dict["0th"]["first_ifd_pointer"];
        delete exif_dict["0th"]["first_ifd_pointer"];

        if (34665 in exif_dict["0th"]) {
            pointer = exif_dict["0th"][34665];
            exif_dict["Exif"] = exifReader.get_ifd(pointer, "Exif");
        }
        if (34853 in exif_dict["0th"]) {
            pointer = exif_dict["0th"][34853];
            exif_dict["GPS"] = exifReader.get_ifd(pointer, "GPS");
        }
        if (40965 in exif_dict["Exif"]) {
            pointer = exif_dict["Exif"][40965];
            exif_dict["Interop"] = exifReader.get_ifd(pointer, "Interop");
        }
        if (first_ifd_pointer != "\x00\x00\x00\x00") {
            pointer = unpack(exifReader.endian_mark + "L",
                first_ifd_pointer)[0];
            exif_dict["1st"] = exifReader.get_ifd(pointer, "1st");
            if ((513 in exif_dict["1st"]) && (514 in exif_dict["1st"])) {
                var end = exif_dict["1st"][513] + exif_dict["1st"][514];
                var thumb = exifReader.tiftag.slice(exif_dict["1st"][513], end);
                exif_dict["thumbnail"] = thumb;
            }
        }

        return exif_dict;
    };


    that.dump = function (exif_dict_original) {
        var TIFF_HEADER_LENGTH = 8;

        var exif_dict = copy(exif_dict_original);
        var header = "Exif\x00\x00\x4d\x4d\x00\x2a\x00\x00\x00\x08";
        var exif_is = false;
        var gps_is = false;
        var interop_is = false;
        var first_is = false;

        var zeroth_ifd,
            exif_ifd,
            interop_ifd,
            gps_ifd,
            first_ifd;
        
        if ("0th" in exif_dict) {
            zeroth_ifd = exif_dict["0th"];
        } else {
            zeroth_ifd = {};
        }
        
        if ((("Exif" in exif_dict) && (Object.keys(exif_dict["Exif"]).length)) ||
            (("Interop" in exif_dict) && (Object.keys(exif_dict["Interop"]).length))) {
            zeroth_ifd[34665] = 1;
            exif_is = true;
            exif_ifd = exif_dict["Exif"];
            if (("Interop" in exif_dict) && Object.keys(exif_dict["Interop"]).length) {
                exif_ifd[40965] = 1;
                interop_is = true;
                interop_ifd = exif_dict["Interop"];
            } else if (Object.keys(exif_ifd).indexOf(that.ExifIFD.InteroperabilityTag.toString()) > -1) {
                delete exif_ifd[40965];
            }
        } else if (Object.keys(zeroth_ifd).indexOf(that.ImageIFD.ExifTag.toString()) > -1) {
            delete zeroth_ifd[34665];
        }

        if (("GPS" in exif_dict) && (Object.keys(exif_dict["GPS"]).length)) {
            zeroth_ifd[that.ImageIFD.GPSTag] = 1;
            gps_is = true;
            gps_ifd = exif_dict["GPS"];
        } else if (Object.keys(zeroth_ifd).indexOf(that.ImageIFD.GPSTag.toString()) > -1) {
            delete zeroth_ifd[that.ImageIFD.GPSTag];
        }
        
        if (("1st" in exif_dict) &&
            ("thumbnail" in exif_dict) &&
            (exif_dict["thumbnail"] != null)) {
            first_is = true;
            exif_dict["1st"][513] = 1;
            exif_dict["1st"][514] = 1;
            first_ifd = exif_dict["1st"];
        }
        
        var zeroth_set = _dict_to_bytes(zeroth_ifd, "0th", 0);
        var zeroth_length = (zeroth_set[0].length + exif_is * 12 + gps_is * 12 + 4 +
            zeroth_set[1].length);

        var exif_set,
            exif_bytes = "",
            exif_length = 0,
            gps_set,
            gps_bytes = "",
            gps_length = 0,
            interop_set,
            interop_bytes = "",
            interop_length = 0,
            first_set,
            first_bytes = "",
            thumbnail;
        if (exif_is) {
            exif_set = _dict_to_bytes(exif_ifd, "Exif", zeroth_length);
            exif_length = exif_set[0].length + interop_is * 12 + exif_set[1].length;
        }
        if (gps_is) {
            gps_set = _dict_to_bytes(gps_ifd, "GPS", zeroth_length + exif_length);
            gps_bytes = gps_set.join("");
            gps_length = gps_bytes.length;
        }
        if (interop_is) {
            var offset = zeroth_length + exif_length + gps_length;
            interop_set = _dict_to_bytes(interop_ifd, "Interop", offset);
            interop_bytes = interop_set.join("");
            interop_length = interop_bytes.length;
        }
        if (first_is) {
            var offset = zeroth_length + exif_length + gps_length + interop_length;
            first_set = _dict_to_bytes(first_ifd, "1st", offset);
            thumbnail = _get_thumbnail(exif_dict["thumbnail"]);
            if (thumbnail.length > 64000) {
                throw ("Given thumbnail is too large. max 64kB");
            }
        }

        var exif_pointer = "",
            gps_pointer = "",
            interop_pointer = "",
            first_ifd_pointer = "\x00\x00\x00\x00";
        if (exif_is) {
            var pointer_value = TIFF_HEADER_LENGTH + zeroth_length;
            var pointer_str = pack(">L", [pointer_value]);
            var key = 34665;
            var key_str = pack(">H", [key]);
            var type_str = pack(">H", [TYPES["Long"]]);
            var length_str = pack(">L", [1]);
            exif_pointer = key_str + type_str + length_str + pointer_str;
        }
        if (gps_is) {
            var pointer_value = TIFF_HEADER_LENGTH + zeroth_length + exif_length;
            var pointer_str = pack(">L", [pointer_value]);
            var key = 34853;
            var key_str = pack(">H", [key]);
            var type_str = pack(">H", [TYPES["Long"]]);
            var length_str = pack(">L", [1]);
            gps_pointer = key_str + type_str + length_str + pointer_str;
        }
        if (interop_is) {
            var pointer_value = (TIFF_HEADER_LENGTH +
                zeroth_length + exif_length + gps_length);
            var pointer_str = pack(">L", [pointer_value]);
            var key = 40965;
            var key_str = pack(">H", [key]);
            var type_str = pack(">H", [TYPES["Long"]]);
            var length_str = pack(">L", [1]);
            interop_pointer = key_str + type_str + length_str + pointer_str;
        }
        if (first_is) {
            var pointer_value = (TIFF_HEADER_LENGTH + zeroth_length +
                exif_length + gps_length + interop_length);
            first_ifd_pointer = pack(">L", [pointer_value]);
            var thumbnail_pointer = (pointer_value + first_set[0].length + 24 +
                4 + first_set[1].length);
            var thumbnail_p_bytes = ("\x02\x01\x00\x04\x00\x00\x00\x01" +
                pack(">L", [thumbnail_pointer]));
            var thumbnail_length_bytes = ("\x02\x02\x00\x04\x00\x00\x00\x01" +
                pack(">L", [thumbnail.length]));
            first_bytes = (first_set[0] + thumbnail_p_bytes +
                thumbnail_length_bytes + "\x00\x00\x00\x00" +
                first_set[1] + thumbnail);
        }

        var zeroth_bytes = (zeroth_set[0] + exif_pointer + gps_pointer +
            first_ifd_pointer + zeroth_set[1]);
        if (exif_is) {
            exif_bytes = exif_set[0] + interop_pointer + exif_set[1];
        }

        return (header + zeroth_bytes + exif_bytes + gps_bytes +
            interop_bytes + first_bytes);
    };


    function copy(obj) {
        return JSON.parse(JSON.stringify(obj));
    }


    function _get_thumbnail(jpeg) {
        var segments = splitIntoSegments(jpeg);
        while (("\xff\xe0" <= segments[1].slice(0, 2)) && (segments[1].slice(0, 2) <= "\xff\xef")) {
            segments = [segments[0]].concat(segments.slice(2));
        }
        return segments.join("");
    }


    function _pack_byte(array) {
        return pack(">" + nStr("B", array.length), array);
    }


    function _pack_short(array) {
        return pack(">" + nStr("H", array.length), array);
    }


    function _pack_long(array) {
        return pack(">" + nStr("L", array.length), array);
    }


    function _value_to_bytes(raw_value, value_type, offset) {
        var four_bytes_over = "";
        var value_str = "";
        var length,
            new_value,
            num,
            den;

        if (value_type == "Byte") {
            length = raw_value.length;
            if (length <= 4) {
                value_str = (_pack_byte(raw_value) +
                    nStr("\x00", 4 - length));
            } else {
                value_str = pack(">L", [offset]);
                four_bytes_over = _pack_byte(raw_value);
            }
        } else if (value_type == "Short") {
            length = raw_value.length;
            if (length <= 2) {
                value_str = (_pack_short(raw_value) +
                    nStr("\x00\x00", 2 - length));
            } else {
                value_str = pack(">L", [offset]);
                four_bytes_over = _pack_short(raw_value);
            }
        } else if (value_type == "Long") {
            length = raw_value.length;
            if (length <= 1) {
                value_str = _pack_long(raw_value);
            } else {
                value_str = pack(">L", [offset]);
                four_bytes_over = _pack_long(raw_value);
            }
        } else if (value_type == "Ascii") {
            new_value = raw_value + "\x00";
            length = new_value.length;
            if (length > 4) {
                value_str = pack(">L", [offset]);
                four_bytes_over = new_value;
            } else {
                value_str = new_value + nStr("\x00", 4 - length);
            }
        } else if (value_type == "Rational") {
            if (typeof (raw_value[0]) == "number") {
                length = 1;
                num = raw_value[0];
                den = raw_value[1];
                new_value = pack(">L", [num]) + pack(">L", [den]);
            } else {
                length = raw_value.length;
                new_value = "";
                for (var n = 0; n < length; n++) {
                    num = raw_value[n][0];
                    den = raw_value[n][1];
                    new_value += (pack(">L", [num]) +
                        pack(">L", [den]));
                }
            }
            value_str = pack(">L", [offset]);
            four_bytes_over = new_value;
        } else if (value_type == "SRational") {
            if (typeof (raw_value[0]) == "number") {
                length = 1;
                num = raw_value[0];
                den = raw_value[1];
                new_value = pack(">l", [num]) + pack(">l", [den]);
            } else {
                length = raw_value.length;
                new_value = "";
                for (var n = 0; n < length; n++) {
                    num = raw_value[n][0];
                    den = raw_value[n][1];
                    new_value += (pack(">l", [num]) +
                        pack(">l", [den]));
                }
            }
            value_str = pack(">L", [offset]);
            four_bytes_over = new_value;
        } else if (value_type == "Undefined") {
            length = raw_value.length;
            if (length > 4) {
                value_str = pack(">L", [offset]);
                four_bytes_over = raw_value;
            } else {
                value_str = raw_value + nStr("\x00", 4 - length);
            }
        }

        var length_str = pack(">L", [length]);

        return [length_str, value_str, four_bytes_over];
    }

    function _dict_to_bytes(ifd_dict, ifd, ifd_offset) {
        var TIFF_HEADER_LENGTH = 8;
        var tag_count = Object.keys(ifd_dict).length;
        var entry_header = pack(">H", [tag_count]);
        var entries_length;
        if (["0th", "1st"].indexOf(ifd) > -1) {
            entries_length = 2 + tag_count * 12 + 4;
        } else {
            entries_length = 2 + tag_count * 12;
        }
        var entries = "";
        var values = "";
        var key;

        for (var key in ifd_dict) {
            if (typeof (key) == "string") {
                key = parseInt(key);
            }
            if ((ifd == "0th") && ([34665, 34853].indexOf(key) > -1)) {
                continue;
            } else if ((ifd == "Exif") && (key == 40965)) {
                continue;
            } else if ((ifd == "1st") && ([513, 514].indexOf(key) > -1)) {
                continue;
            }

            var raw_value = ifd_dict[key];
            var key_str = pack(">H", [key]);
            var value_type = TAGS[ifd][key]["type"];
            var type_str = pack(">H", [TYPES[value_type]]);

            if (typeof (raw_value) == "number") {
                raw_value = [raw_value];
            }
            var offset = TIFF_HEADER_LENGTH + entries_length + ifd_offset + values.length;
            var b = _value_to_bytes(raw_value, value_type, offset);
            var length_str = b[0];
            var value_str = b[1];
            var four_bytes_over = b[2];

            entries += key_str + type_str + length_str + value_str;
            values += four_bytes_over;
        }

        return [entry_header + entries, values];
    }



    function ExifReader(data) {
        var segments,
            app1;
        if (data.slice(0, 2) == "\xff\xd8") { // JPEG
            segments = splitIntoSegments(data);
            app1 = getExifSeg(segments);
            if (app1) {
                this.tiftag = app1.slice(10);
            } else {
                this.tiftag = null;
            }
        } else if (["\x49\x49", "\x4d\x4d"].indexOf(data.slice(0, 2)) > -1) { // TIFF
            this.tiftag = data;
        } else if (data.slice(0, 4) == "Exif") { // Exif
            this.tiftag = data.slice(6);
        } else {
            throw ("Given file is neither JPEG nor TIFF.");
        }
    }

    ExifReader.prototype = {
        get_ifd: function (pointer, ifd_name) {
            var ifd_dict = {};
            var tag_count = unpack(this.endian_mark + "H",
                this.tiftag.slice(pointer, pointer + 2))[0];
            var offset = pointer + 2;
            var t;
            if (["0th", "1st"].indexOf(ifd_name) > -1) {
                t = "Image";
            } else {
                t = ifd_name;
            }

            for (var x = 0; x < tag_count; x++) {
                pointer = offset + 12 * x;
                var tag = unpack(this.endian_mark + "H",
                    this.tiftag.slice(pointer, pointer + 2))[0];
                var value_type = unpack(this.endian_mark + "H",
                    this.tiftag.slice(pointer + 2, pointer + 4))[0];
                var value_num = unpack(this.endian_mark + "L",
                    this.tiftag.slice(pointer + 4, pointer + 8))[0];
                var value = this.tiftag.slice(pointer + 8, pointer + 12);

                var v_set = [value_type, value_num, value];
                if (tag in TAGS[t]) {
                    ifd_dict[tag] = this.convert_value(v_set);
                }
            }

            if (ifd_name == "0th") {
                pointer = offset + 12 * tag_count;
                ifd_dict["first_ifd_pointer"] = this.tiftag.slice(pointer, pointer + 4);
            }

            return ifd_dict;
        },

        convert_value: function (val) {
            var data = null;
            var t = val[0];
            var length = val[1];
            var value = val[2];
            var pointer;

            if (t == 1) { // BYTE
                if (length > 4) {
                    pointer = unpack(this.endian_mark + "L", value)[0];
                    data = unpack(this.endian_mark + nStr("B", length),
                        this.tiftag.slice(pointer, pointer + length));
                } else {
                    data = unpack(this.endian_mark + nStr("B", length), value.slice(0, length));
                }
            } else if (t == 2) { // ASCII
                if (length > 4) {
                    pointer = unpack(this.endian_mark + "L", value)[0];
                    data = this.tiftag.slice(pointer, pointer + length - 1);
                } else {
                    data = value.slice(0, length - 1);
                }
            } else if (t == 3) { // SHORT
                if (length > 2) {
                    pointer = unpack(this.endian_mark + "L", value)[0];
                    data = unpack(this.endian_mark + nStr("H", length),
                        this.tiftag.slice(pointer, pointer + length * 2));
                } else {
                    data = unpack(this.endian_mark + nStr("H", length),
                        value.slice(0, length * 2));
                }
            } else if (t == 4) { // LONG
                if (length > 1) {
                    pointer = unpack(this.endian_mark + "L", value)[0];
                    data = unpack(this.endian_mark + nStr("L", length),
                        this.tiftag.slice(pointer, pointer + length * 4));
                } else {
                    data = unpack(this.endian_mark + nStr("L", length),
                        value);
                }
            } else if (t == 5) { // RATIONAL
                pointer = unpack(this.endian_mark + "L", value)[0];
                if (length > 1) {
                    data = [];
                    for (var x = 0; x < length; x++) {
                        data.push([unpack(this.endian_mark + "L",
                                this.tiftag.slice(pointer + x * 8, pointer + 4 + x * 8))[0],
                                   unpack(this.endian_mark + "L",
                                this.tiftag.slice(pointer + 4 + x * 8, pointer + 8 + x * 8))[0]
                                   ]);
                    }
                } else {
                    data = [unpack(this.endian_mark + "L",
                            this.tiftag.slice(pointer, pointer + 4))[0],
                            unpack(this.endian_mark + "L",
                            this.tiftag.slice(pointer + 4, pointer + 8))[0]
                            ];
                }
            } else if (t == 7) { // UNDEFINED BYTES
                if (length > 4) {
                    pointer = unpack(this.endian_mark + "L", value)[0];
                    data = this.tiftag.slice(pointer, pointer + length);
                } else {
                    data = value.slice(0, length);
                }
            } else if (t == 10) { // SRATIONAL
                pointer = unpack(this.endian_mark + "L", value)[0];
                if (length > 1) {
                    data = [];
                    for (var x = 0; x < length; x++) {
                        data.push([unpack(this.endian_mark + "l",
                                this.tiftag.slice(pointer + x * 8, pointer + 4 + x * 8))[0],
                                   unpack(this.endian_mark + "l",
                                this.tiftag.slice(pointer + 4 + x * 8, pointer + 8 + x * 8))[0]
                                  ]);
                    }
                } else {
                    data = [unpack(this.endian_mark + "l",
                            this.tiftag.slice(pointer, pointer + 4))[0],
                            unpack(this.endian_mark + "l",
                            this.tiftag.slice(pointer + 4, pointer + 8))[0]
                           ];
                }
            } else {
                throw ("Exif might be wrong. Got incorrect value " +
                    "type to decode. type:" + t);
            }

            if ((data instanceof Array) && (data.length == 1)) {
                return data[0];
            } else {
                return data;
            }
        },
    };


    if (typeof window !== "undefined" && typeof window.btoa === "function") {
        var btoa = window.btoa;
    }
    if (typeof btoa === "undefined") {
        var btoa = function (input) {        var output = "";
            var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
            var i = 0;
            var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

            while (i < input.length) {

                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output +
                keyStr.charAt(enc1) + keyStr.charAt(enc2) +
                keyStr.charAt(enc3) + keyStr.charAt(enc4);

            }

            return output;
        };
    }
    
    
    if (typeof window !== "undefined" && typeof window.atob === "function") {
        var atob = window.atob;
    }
    if (typeof atob === "undefined") {
        var atob = function (input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;
            var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            while (i < input.length) {

                enc1 = keyStr.indexOf(input.charAt(i++));
                enc2 = keyStr.indexOf(input.charAt(i++));
                enc3 = keyStr.indexOf(input.charAt(i++));
                enc4 = keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

            }

            return output;
        };
    }


    function getImageSize(imageArray) {
        var segments = slice2Segments(imageArray);
        var seg,
            width,
            height,
            SOF = [192, 193, 194, 195, 197, 198, 199, 201, 202, 203, 205, 206, 207];

        for (var x = 0; x < segments.length; x++) {
            seg = segments[x];
            if (SOF.indexOf(seg[1]) >= 0) {
                height = seg[5] * 256 + seg[6];
                width = seg[7] * 256 + seg[8];
                break;
            }
        }
        return [width, height];
    }


    function pack(mark, array) {
        if (!(array instanceof Array)) {
            throw ("'pack' error. Got invalid type argument.");
        }
        if ((mark.length - 1) != array.length) {
            throw ("'pack' error. " + (mark.length - 1) + " marks, " + array.length + " elements.");
        }

        var littleEndian;
        if (mark[0] == "<") {
            littleEndian = true;
        } else if (mark[0] == ">") {
            littleEndian = false;
        } else {
            throw ("");
        }
        var packed = "";
        var p = 1;
        var val = null;
        var c = null;
        var valStr = null;

        while (c = mark[p]) {
            if (c.toLowerCase() == "b") {
                val = array[p - 1];
                if ((c == "b") && (val < 0)) {
                    val += 0x100;
                }
                if ((val > 0xff) || (val < 0)) {
                    throw ("'pack' error.");
                } else {
                    valStr = String.fromCharCode(val);
                }
            } else if (c == "H") {
                val = array[p - 1];
                if ((val > 0xffff) || (val < 0)) {
                    throw ("'pack' error.");
                } else {
                    valStr = String.fromCharCode(Math.floor((val % 0x10000) / 0x100)) +
                        String.fromCharCode(val % 0x100);
                    if (littleEndian) {
                        valStr = valStr.split("").reverse().join("");
                    }
                }
            } else if (c.toLowerCase() == "l") {
                val = array[p - 1];
                if ((c == "l") && (val < 0)) {
                    val += 0x100000000;
                }
                if ((val > 0xffffffff) || (val < 0)) {
                    throw ("'pack' error.");
                } else {
                    valStr = String.fromCharCode(Math.floor(val / 0x1000000)) +
                        String.fromCharCode(Math.floor((val % 0x1000000) / 0x10000)) +
                        String.fromCharCode(Math.floor((val % 0x10000) / 0x100)) +
                        String.fromCharCode(val % 0x100);
                    if (littleEndian) {
                        valStr = valStr.split("").reverse().join("");
                    }
                }
            } else {
                throw ("'pack' error.");
            }

            packed += valStr;
            p += 1;
        }

        return packed;
    }

    function unpack(mark, str) {
        if (typeof (str) != "string") {
            throw ("'unpack' error. Got invalid type argument.");
        }
        var l = 0;
        for (var markPointer = 1; markPointer < mark.length; markPointer++) {
            if (mark[markPointer].toLowerCase() == "b") {
                l += 1;
            } else if (mark[markPointer].toLowerCase() == "h") {
                l += 2;
            } else if (mark[markPointer].toLowerCase() == "l") {
                l += 4;
            } else {
                throw ("'unpack' error. Got invalid mark.");
            }
        }

        if (l != str.length) {
            throw ("'unpack' error. Mismatch between symbol and string length. " + l + ":" + str.length);
        }

        var littleEndian;
        if (mark[0] == "<") {
            littleEndian = true;
        } else if (mark[0] == ">") {
            littleEndian = false;
        } else {
            throw ("'unpack' error.");
        }
        var unpacked = [];
        var strPointer = 0;
        var p = 1;
        var val = null;
        var c = null;
        var length = null;
        var sliced = "";

        while (c = mark[p]) {
            if (c.toLowerCase() == "b") {
                length = 1;
                sliced = str.slice(strPointer, strPointer + length);
                val = sliced.charCodeAt(0);
                if ((c == "b") && (val >= 0x80)) {
                    val -= 0x100;
                }
            } else if (c == "H") {
                length = 2;
                sliced = str.slice(strPointer, strPointer + length);
                if (littleEndian) {
                    sliced = sliced.split("").reverse().join("");
                }
                val = sliced.charCodeAt(0) * 0x100 +
                    sliced.charCodeAt(1);
            } else if (c.toLowerCase() == "l") {
                length = 4;
                sliced = str.slice(strPointer, strPointer + length);
                if (littleEndian) {
                    sliced = sliced.split("").reverse().join("");
                }
                val = sliced.charCodeAt(0) * 0x1000000 +
                    sliced.charCodeAt(1) * 0x10000 +
                    sliced.charCodeAt(2) * 0x100 +
                    sliced.charCodeAt(3);
                if ((c == "l") && (val >= 0x80000000)) {
                    val -= 0x100000000;
                }
            } else {
                throw ("'unpack' error. " + c);
            }

            unpacked.push(val);
            strPointer += length;
            p += 1;
        }

        return unpacked;
    }

    function nStr(ch, num) {
        var str = "";
        for (var i = 0; i < num; i++) {
            str += ch;
        }
        return str;
    }

    function splitIntoSegments(data) {
        if (data.slice(0, 2) != "\xff\xd8") {
            throw ("Given data isn't JPEG.");
        }

        var head = 2;
        var segments = ["\xff\xd8"];
        while (true) {
            if (data.slice(head, head + 2) == "\xff\xda") {
                segments.push(data.slice(head));
                break;
            } else {
                var length = unpack(">H", data.slice(head + 2, head + 4))[0];
                var endPoint = head + length + 2;
                segments.push(data.slice(head, endPoint));
                head = endPoint;
            }

            if (head >= data.length) {
                throw ("Wrong JPEG data.");
            }
        }
        return segments;
    }


    function getExifSeg(segments) {
        var seg;
        for (var i = 0; i < segments.length; i++) {
            seg = segments[i];
            if (seg.slice(0, 2) == "\xff\xe1" &&
                   seg.slice(4, 10) == "Exif\x00\x00") {
                return seg;
            }
        }
        return null;
    }


    function mergeSegments(segments, exif) {
        
        if (segments[1].slice(0, 2) == "\xff\xe0" &&
            (segments[2].slice(0, 2) == "\xff\xe1" &&
             segments[2].slice(4, 10) == "Exif\x00\x00")) {
            if (exif) {
                segments[2] = exif;
                segments = ["\xff\xd8"].concat(segments.slice(2));
            } else if (exif == null) {
                segments = segments.slice(0, 2).concat(segments.slice(3));
            } else {
                segments = segments.slice(0).concat(segments.slice(2));
            }
        } else if (segments[1].slice(0, 2) == "\xff\xe0") {
            if (exif) {
                segments[1] = exif;
            }
        } else if (segments[1].slice(0, 2) == "\xff\xe1" &&
                   segments[1].slice(4, 10) == "Exif\x00\x00") {
            if (exif) {
                segments[1] = exif;
            } else if (exif == null) {
                segments = segments.slice(0).concat(segments.slice(2));
            }
        } else {
            if (exif) {
                segments = [segments[0], exif].concat(segments.slice(1));
            }
        }
        
        return segments.join("");
    }


    function toHex(str) {
        var hexStr = "";
        for (var i = 0; i < str.length; i++) {
            var h = str.charCodeAt(i);
            var hex = ((h < 10) ? "0" : "") + h.toString(16);
            hexStr += hex + " ";
        }
        return hexStr;
    }


    var TYPES = {
        "Byte": 1,
        "Ascii": 2,
        "Short": 3,
        "Long": 4,
        "Rational": 5,
        "Undefined": 7,
        "SLong": 9,
        "SRational": 10
    };


    var TAGS = {
        'Image': {
            11: {
                'name': 'ProcessingSoftware',
                'type': 'Ascii'
            },
            254: {
                'name': 'NewSubfileType',
                'type': 'Long'
            },
            255: {
                'name': 'SubfileType',
                'type': 'Short'
            },
            256: {
                'name': 'ImageWidth',
                'type': 'Long'
            },
            257: {
                'name': 'ImageLength',
                'type': 'Long'
            },
            258: {
                'name': 'BitsPerSample',
                'type': 'Short'
            },
            259: {
                'name': 'Compression',
                'type': 'Short'
            },
            262: {
                'name': 'PhotometricInterpretation',
                'type': 'Short'
            },
            263: {
                'name': 'Threshholding',
                'type': 'Short'
            },
            264: {
                'name': 'CellWidth',
                'type': 'Short'
            },
            265: {
                'name': 'CellLength',
                'type': 'Short'
            },
            266: {
                'name': 'FillOrder',
                'type': 'Short'
            },
            269: {
                'name': 'DocumentName',
                'type': 'Ascii'
            },
            270: {
                'name': 'ImageDescription',
                'type': 'Ascii'
            },
            271: {
                'name': 'Make',
                'type': 'Ascii'
            },
            272: {
                'name': 'Model',
                'type': 'Ascii'
            },
            273: {
                'name': 'StripOffsets',
                'type': 'Long'
            },
            274: {
                'name': 'Orientation',
                'type': 'Short'
            },
            277: {
                'name': 'SamplesPerPixel',
                'type': 'Short'
            },
            278: {
                'name': 'RowsPerStrip',
                'type': 'Long'
            },
            279: {
                'name': 'StripByteCounts',
                'type': 'Long'
            },
            282: {
                'name': 'XResolution',
                'type': 'Rational'
            },
            283: {
                'name': 'YResolution',
                'type': 'Rational'
            },
            284: {
                'name': 'PlanarConfiguration',
                'type': 'Short'
            },
            290: {
                'name': 'GrayResponseUnit',
                'type': 'Short'
            },
            291: {
                'name': 'GrayResponseCurve',
                'type': 'Short'
            },
            292: {
                'name': 'T4Options',
                'type': 'Long'
            },
            293: {
                'name': 'T6Options',
                'type': 'Long'
            },
            296: {
                'name': 'ResolutionUnit',
                'type': 'Short'
            },
            301: {
                'name': 'TransferFunction',
                'type': 'Short'
            },
            305: {
                'name': 'Software',
                'type': 'Ascii'
            },
            306: {
                'name': 'DateTime',
                'type': 'Ascii'
            },
            315: {
                'name': 'Artist',
                'type': 'Ascii'
            },
            316: {
                'name': 'HostComputer',
                'type': 'Ascii'
            },
            317: {
                'name': 'Predictor',
                'type': 'Short'
            },
            318: {
                'name': 'WhitePoint',
                'type': 'Rational'
            },
            319: {
                'name': 'PrimaryChromaticities',
                'type': 'Rational'
            },
            320: {
                'name': 'ColorMap',
                'type': 'Short'
            },
            321: {
                'name': 'HalftoneHints',
                'type': 'Short'
            },
            322: {
                'name': 'TileWidth',
                'type': 'Short'
            },
            323: {
                'name': 'TileLength',
                'type': 'Short'
            },
            324: {
                'name': 'TileOffsets',
                'type': 'Short'
            },
            325: {
                'name': 'TileByteCounts',
                'type': 'Short'
            },
            330: {
                'name': 'SubIFDs',
                'type': 'Long'
            },
            332: {
                'name': 'InkSet',
                'type': 'Short'
            },
            333: {
                'name': 'InkNames',
                'type': 'Ascii'
            },
            334: {
                'name': 'NumberOfInks',
                'type': 'Short'
            },
            336: {
                'name': 'DotRange',
                'type': 'Byte'
            },
            337: {
                'name': 'TargetPrinter',
                'type': 'Ascii'
            },
            338: {
                'name': 'ExtraSamples',
                'type': 'Short'
            },
            339: {
                'name': 'SampleFormat',
                'type': 'Short'
            },
            340: {
                'name': 'SMinSampleValue',
                'type': 'Short'
            },
            341: {
                'name': 'SMaxSampleValue',
                'type': 'Short'
            },
            342: {
                'name': 'TransferRange',
                'type': 'Short'
            },
            343: {
                'name': 'ClipPath',
                'type': 'Byte'
            },
            344: {
                'name': 'XClipPathUnits',
                'type': 'Long'
            },
            345: {
                'name': 'YClipPathUnits',
                'type': 'Long'
            },
            346: {
                'name': 'Indexed',
                'type': 'Short'
            },
            347: {
                'name': 'JPEGTables',
                'type': 'Undefined'
            },
            351: {
                'name': 'OPIProxy',
                'type': 'Short'
            },
            512: {
                'name': 'JPEGProc',
                'type': 'Long'
            },
            513: {
                'name': 'JPEGInterchangeFormat',
                'type': 'Long'
            },
            514: {
                'name': 'JPEGInterchangeFormatLength',
                'type': 'Long'
            },
            515: {
                'name': 'JPEGRestartInterval',
                'type': 'Short'
            },
            517: {
                'name': 'JPEGLosslessPredictors',
                'type': 'Short'
            },
            518: {
                'name': 'JPEGPointTransforms',
                'type': 'Short'
            },
            519: {
                'name': 'JPEGQTables',
                'type': 'Long'
            },
            520: {
                'name': 'JPEGDCTables',
                'type': 'Long'
            },
            521: {
                'name': 'JPEGACTables',
                'type': 'Long'
            },
            529: {
                'name': 'YCbCrCoefficients',
                'type': 'Rational'
            },
            530: {
                'name': 'YCbCrSubSampling',
                'type': 'Short'
            },
            531: {
                'name': 'YCbCrPositioning',
                'type': 'Short'
            },
            532: {
                'name': 'ReferenceBlackWhite',
                'type': 'Rational'
            },
            700: {
                'name': 'XMLPacket',
                'type': 'Byte'
            },
            18246: {
                'name': 'Rating',
                'type': 'Short'
            },
            18249: {
                'name': 'RatingPercent',
                'type': 'Short'
            },
            32781: {
                'name': 'ImageID',
                'type': 'Ascii'
            },
            33421: {
                'name': 'CFARepeatPatternDim',
                'type': 'Short'
            },
            33422: {
                'name': 'CFAPattern',
                'type': 'Byte'
            },
            33423: {
                'name': 'BatteryLevel',
                'type': 'Rational'
            },
            33432: {
                'name': 'Copyright',
                'type': 'Ascii'
            },
            33434: {
                'name': 'ExposureTime',
                'type': 'Rational'
            },
            34377: {
                'name': 'ImageResources',
                'type': 'Byte'
            },
            34665: {
                'name': 'ExifTag',
                'type': 'Long'
            },
            34675: {
                'name': 'InterColorProfile',
                'type': 'Undefined'
            },
            34853: {
                'name': 'GPSTag',
                'type': 'Long'
            },
            34857: {
                'name': 'Interlace',
                'type': 'Short'
            },
            34858: {
                'name': 'TimeZoneOffset',
                'type': 'Long'
            },
            34859: {
                'name': 'SelfTimerMode',
                'type': 'Short'
            },
            37387: {
                'name': 'FlashEnergy',
                'type': 'Rational'
            },
            37388: {
                'name': 'SpatialFrequencyResponse',
                'type': 'Undefined'
            },
            37389: {
                'name': 'Noise',
                'type': 'Undefined'
            },
            37390: {
                'name': 'FocalPlaneXResolution',
                'type': 'Rational'
            },
            37391: {
                'name': 'FocalPlaneYResolution',
                'type': 'Rational'
            },
            37392: {
                'name': 'FocalPlaneResolutionUnit',
                'type': 'Short'
            },
            37393: {
                'name': 'ImageNumber',
                'type': 'Long'
            },
            37394: {
                'name': 'SecurityClassification',
                'type': 'Ascii'
            },
            37395: {
                'name': 'ImageHistory',
                'type': 'Ascii'
            },
            37397: {
                'name': 'ExposureIndex',
                'type': 'Rational'
            },
            37398: {
                'name': 'TIFFEPStandardID',
                'type': 'Byte'
            },
            37399: {
                'name': 'SensingMethod',
                'type': 'Short'
            },
            40091: {
                'name': 'XPTitle',
                'type': 'Byte'
            },
            40092: {
                'name': 'XPComment',
                'type': 'Byte'
            },
            40093: {
                'name': 'XPAuthor',
                'type': 'Byte'
            },
            40094: {
                'name': 'XPKeywords',
                'type': 'Byte'
            },
            40095: {
                'name': 'XPSubject',
                'type': 'Byte'
            },
            50341: {
                'name': 'PrintImageMatching',
                'type': 'Undefined'
            },
            50706: {
                'name': 'DNGVersion',
                'type': 'Byte'
            },
            50707: {
                'name': 'DNGBackwardVersion',
                'type': 'Byte'
            },
            50708: {
                'name': 'UniqueCameraModel',
                'type': 'Ascii'
            },
            50709: {
                'name': 'LocalizedCameraModel',
                'type': 'Byte'
            },
            50710: {
                'name': 'CFAPlaneColor',
                'type': 'Byte'
            },
            50711: {
                'name': 'CFALayout',
                'type': 'Short'
            },
            50712: {
                'name': 'LinearizationTable',
                'type': 'Short'
            },
            50713: {
                'name': 'BlackLevelRepeatDim',
                'type': 'Short'
            },
            50714: {
                'name': 'BlackLevel',
                'type': 'Rational'
            },
            50715: {
                'name': 'BlackLevelDeltaH',
                'type': 'SRational'
            },
            50716: {
                'name': 'BlackLevelDeltaV',
                'type': 'SRational'
            },
            50717: {
                'name': 'WhiteLevel',
                'type': 'Short'
            },
            50718: {
                'name': 'DefaultScale',
                'type': 'Rational'
            },
            50719: {
                'name': 'DefaultCropOrigin',
                'type': 'Short'
            },
            50720: {
                'name': 'DefaultCropSize',
                'type': 'Short'
            },
            50721: {
                'name': 'ColorMatrix1',
                'type': 'SRational'
            },
            50722: {
                'name': 'ColorMatrix2',
                'type': 'SRational'
            },
            50723: {
                'name': 'CameraCalibration1',
                'type': 'SRational'
            },
            50724: {
                'name': 'CameraCalibration2',
                'type': 'SRational'
            },
            50725: {
                'name': 'ReductionMatrix1',
                'type': 'SRational'
            },
            50726: {
                'name': 'ReductionMatrix2',
                'type': 'SRational'
            },
            50727: {
                'name': 'AnalogBalance',
                'type': 'Rational'
            },
            50728: {
                'name': 'AsShotNeutral',
                'type': 'Short'
            },
            50729: {
                'name': 'AsShotWhiteXY',
                'type': 'Rational'
            },
            50730: {
                'name': 'BaselineExposure',
                'type': 'SRational'
            },
            50731: {
                'name': 'BaselineNoise',
                'type': 'Rational'
            },
            50732: {
                'name': 'BaselineSharpness',
                'type': 'Rational'
            },
            50733: {
                'name': 'BayerGreenSplit',
                'type': 'Long'
            },
            50734: {
                'name': 'LinearResponseLimit',
                'type': 'Rational'
            },
            50735: {
                'name': 'CameraSerialNumber',
                'type': 'Ascii'
            },
            50736: {
                'name': 'LensInfo',
                'type': 'Rational'
            },
            50737: {
                'name': 'ChromaBlurRadius',
                'type': 'Rational'
            },
            50738: {
                'name': 'AntiAliasStrength',
                'type': 'Rational'
            },
            50739: {
                'name': 'ShadowScale',
                'type': 'SRational'
            },
            50740: {
                'name': 'DNGPrivateData',
                'type': 'Byte'
            },
            50741: {
                'name': 'MakerNoteSafety',
                'type': 'Short'
            },
            50778: {
                'name': 'CalibrationIlluminant1',
                'type': 'Short'
            },
            50779: {
                'name': 'CalibrationIlluminant2',
                'type': 'Short'
            },
            50780: {
                'name': 'BestQualityScale',
                'type': 'Rational'
            },
            50781: {
                'name': 'RawDataUniqueID',
                'type': 'Byte'
            },
            50827: {
                'name': 'OriginalRawFileName',
                'type': 'Byte'
            },
            50828: {
                'name': 'OriginalRawFileData',
                'type': 'Undefined'
            },
            50829: {
                'name': 'ActiveArea',
                'type': 'Short'
            },
            50830: {
                'name': 'MaskedAreas',
                'type': 'Short'
            },
            50831: {
                'name': 'AsShotICCProfile',
                'type': 'Undefined'
            },
            50832: {
                'name': 'AsShotPreProfileMatrix',
                'type': 'SRational'
            },
            50833: {
                'name': 'CurrentICCProfile',
                'type': 'Undefined'
            },
            50834: {
                'name': 'CurrentPreProfileMatrix',
                'type': 'SRational'
            },
            50879: {
                'name': 'ColorimetricReference',
                'type': 'Short'
            },
            50931: {
                'name': 'CameraCalibrationSignature',
                'type': 'Byte'
            },
            50932: {
                'name': 'ProfileCalibrationSignature',
                'type': 'Byte'
            },
            50934: {
                'name': 'AsShotProfileName',
                'type': 'Byte'
            },
            50935: {
                'name': 'NoiseReductionApplied',
                'type': 'Rational'
            },
            50936: {
                'name': 'ProfileName',
                'type': 'Byte'
            },
            50937: {
                'name': 'ProfileHueSatMapDims',
                'type': 'Long'
            },
            50938: {
                'name': 'ProfileHueSatMapData1',
                'type': 'Float'
            },
            50939: {
                'name': 'ProfileHueSatMapData2',
                'type': 'Float'
            },
            50940: {
                'name': 'ProfileToneCurve',
                'type': 'Float'
            },
            50941: {
                'name': 'ProfileEmbedPolicy',
                'type': 'Long'
            },
            50942: {
                'name': 'ProfileCopyright',
                'type': 'Byte'
            },
            50964: {
                'name': 'ForwardMatrix1',
                'type': 'SRational'
            },
            50965: {
                'name': 'ForwardMatrix2',
                'type': 'SRational'
            },
            50966: {
                'name': 'PreviewApplicationName',
                'type': 'Byte'
            },
            50967: {
                'name': 'PreviewApplicationVersion',
                'type': 'Byte'
            },
            50968: {
                'name': 'PreviewSettingsName',
                'type': 'Byte'
            },
            50969: {
                'name': 'PreviewSettingsDigest',
                'type': 'Byte'
            },
            50970: {
                'name': 'PreviewColorSpace',
                'type': 'Long'
            },
            50971: {
                'name': 'PreviewDateTime',
                'type': 'Ascii'
            },
            50972: {
                'name': 'RawImageDigest',
                'type': 'Undefined'
            },
            50973: {
                'name': 'OriginalRawFileDigest',
                'type': 'Undefined'
            },
            50974: {
                'name': 'SubTileBlockSize',
                'type': 'Long'
            },
            50975: {
                'name': 'RowInterleaveFactor',
                'type': 'Long'
            },
            50981: {
                'name': 'ProfileLookTableDims',
                'type': 'Long'
            },
            50982: {
                'name': 'ProfileLookTableData',
                'type': 'Float'
            },
            51008: {
                'name': 'OpcodeList1',
                'type': 'Undefined'
            },
            51009: {
                'name': 'OpcodeList2',
                'type': 'Undefined'
            },
            51022: {
                'name': 'OpcodeList3',
                'type': 'Undefined'
            }
        },
        'Exif': {
            33434: {
                'name': 'ExposureTime',
                'type': 'Rational'
            },
            33437: {
                'name': 'FNumber',
                'type': 'Rational'
            },
            34850: {
                'name': 'ExposureProgram',
                'type': 'Short'
            },
            34852: {
                'name': 'SpectralSensitivity',
                'type': 'Ascii'
            },
            34855: {
                'name': 'ISOSpeedRatings',
                'type': 'Short'
            },
            34856: {
                'name': 'OECF',
                'type': 'Undefined'
            },
            34864: {
                'name': 'SensitivityType',
                'type': 'Short'
            },
            34865: {
                'name': 'StandardOutputSensitivity',
                'type': 'Long'
            },
            34866: {
                'name': 'RecommendedExposureIndex',
                'type': 'Long'
            },
            34867: {
                'name': 'ISOSpeed',
                'type': 'Long'
            },
            34868: {
                'name': 'ISOSpeedLatitudeyyy',
                'type': 'Long'
            },
            34869: {
                'name': 'ISOSpeedLatitudezzz',
                'type': 'Long'
            },
            36864: {
                'name': 'ExifVersion',
                'type': 'Undefined'
            },
            36867: {
                'name': 'DateTimeOriginal',
                'type': 'Ascii'
            },
            36868: {
                'name': 'DateTimeDigitized',
                'type': 'Ascii'
            },
            37121: {
                'name': 'ComponentsConfiguration',
                'type': 'Undefined'
            },
            37122: {
                'name': 'CompressedBitsPerPixel',
                'type': 'Rational'
            },
            37377: {
                'name': 'ShutterSpeedValue',
                'type': 'SRational'
            },
            37378: {
                'name': 'ApertureValue',
                'type': 'Rational'
            },
            37379: {
                'name': 'BrightnessValue',
                'type': 'SRational'
            },
            37380: {
                'name': 'ExposureBiasValue',
                'type': 'SRational'
            },
            37381: {
                'name': 'MaxApertureValue',
                'type': 'Rational'
            },
            37382: {
                'name': 'SubjectDistance',
                'type': 'Rational'
            },
            37383: {
                'name': 'MeteringMode',
                'type': 'Short'
            },
            37384: {
                'name': 'LightSource',
                'type': 'Short'
            },
            37385: {
                'name': 'Flash',
                'type': 'Short'
            },
            37386: {
                'name': 'FocalLength',
                'type': 'Rational'
            },
            37396: {
                'name': 'SubjectArea',
                'type': 'Short'
            },
            37500: {
                'name': 'MakerNote',
                'type': 'Undefined'
            },
            37510: {
                'name': 'UserComment',
                'type': 'Ascii'
            },
            37520: {
                'name': 'SubSecTime',
                'type': 'Ascii'
            },
            37521: {
                'name': 'SubSecTimeOriginal',
                'type': 'Ascii'
            },
            37522: {
                'name': 'SubSecTimeDigitized',
                'type': 'Ascii'
            },
            40960: {
                'name': 'FlashpixVersion',
                'type': 'Undefined'
            },
            40961: {
                'name': 'ColorSpace',
                'type': 'Short'
            },
            40962: {
                'name': 'PixelXDimension',
                'type': 'Long'
            },
            40963: {
                'name': 'PixelYDimension',
                'type': 'Long'
            },
            40964: {
                'name': 'RelatedSoundFile',
                'type': 'Ascii'
            },
            40965: {
                'name': 'InteroperabilityTag',
                'type': 'Long'
            },
            41483: {
                'name': 'FlashEnergy',
                'type': 'Rational'
            },
            41484: {
                'name': 'SpatialFrequencyResponse',
                'type': 'Undefined'
            },
            41486: {
                'name': 'FocalPlaneXResolution',
                'type': 'Rational'
            },
            41487: {
                'name': 'FocalPlaneYResolution',
                'type': 'Rational'
            },
            41488: {
                'name': 'FocalPlaneResolutionUnit',
                'type': 'Short'
            },
            41492: {
                'name': 'SubjectLocation',
                'type': 'Short'
            },
            41493: {
                'name': 'ExposureIndex',
                'type': 'Rational'
            },
            41495: {
                'name': 'SensingMethod',
                'type': 'Short'
            },
            41728: {
                'name': 'FileSource',
                'type': 'Undefined'
            },
            41729: {
                'name': 'SceneType',
                'type': 'Undefined'
            },
            41730: {
                'name': 'CFAPattern',
                'type': 'Undefined'
            },
            41985: {
                'name': 'CustomRendered',
                'type': 'Short'
            },
            41986: {
                'name': 'ExposureMode',
                'type': 'Short'
            },
            41987: {
                'name': 'WhiteBalance',
                'type': 'Short'
            },
            41988: {
                'name': 'DigitalZoomRatio',
                'type': 'Rational'
            },
            41989: {
                'name': 'FocalLengthIn35mmFilm',
                'type': 'Short'
            },
            41990: {
                'name': 'SceneCaptureType',
                'type': 'Short'
            },
            41991: {
                'name': 'GainControl',
                'type': 'Short'
            },
            41992: {
                'name': 'Contrast',
                'type': 'Short'
            },
            41993: {
                'name': 'Saturation',
                'type': 'Short'
            },
            41994: {
                'name': 'Sharpness',
                'type': 'Short'
            },
            41995: {
                'name': 'DeviceSettingDescription',
                'type': 'Undefined'
            },
            41996: {
                'name': 'SubjectDistanceRange',
                'type': 'Short'
            },
            42016: {
                'name': 'ImageUniqueID',
                'type': 'Ascii'
            },
            42032: {
                'name': 'CameraOwnerName',
                'type': 'Ascii'
            },
            42033: {
                'name': 'BodySerialNumber',
                'type': 'Ascii'
            },
            42034: {
                'name': 'LensSpecification',
                'type': 'Rational'
            },
            42035: {
                'name': 'LensMake',
                'type': 'Ascii'
            },
            42036: {
                'name': 'LensModel',
                'type': 'Ascii'
            },
            42037: {
                'name': 'LensSerialNumber',
                'type': 'Ascii'
            },
            42240: {
                'name': 'Gamma',
                'type': 'Rational'
            }
        },
        'GPS': {
            0: {
                'name': 'GPSVersionID',
                'type': 'Byte'
            },
            1: {
                'name': 'GPSLatitudeRef',
                'type': 'Ascii'
            },
            2: {
                'name': 'GPSLatitude',
                'type': 'Rational'
            },
            3: {
                'name': 'GPSLongitudeRef',
                'type': 'Ascii'
            },
            4: {
                'name': 'GPSLongitude',
                'type': 'Rational'
            },
            5: {
                'name': 'GPSAltitudeRef',
                'type': 'Byte'
            },
            6: {
                'name': 'GPSAltitude',
                'type': 'Rational'
            },
            7: {
                'name': 'GPSTimeStamp',
                'type': 'Rational'
            },
            8: {
                'name': 'GPSSatellites',
                'type': 'Ascii'
            },
            9: {
                'name': 'GPSStatus',
                'type': 'Ascii'
            },
            10: {
                'name': 'GPSMeasureMode',
                'type': 'Ascii'
            },
            11: {
                'name': 'GPSDOP',
                'type': 'Rational'
            },
            12: {
                'name': 'GPSSpeedRef',
                'type': 'Ascii'
            },
            13: {
                'name': 'GPSSpeed',
                'type': 'Rational'
            },
            14: {
                'name': 'GPSTrackRef',
                'type': 'Ascii'
            },
            15: {
                'name': 'GPSTrack',
                'type': 'Rational'
            },
            16: {
                'name': 'GPSImgDirectionRef',
                'type': 'Ascii'
            },
            17: {
                'name': 'GPSImgDirection',
                'type': 'Rational'
            },
            18: {
                'name': 'GPSMapDatum',
                'type': 'Ascii'
            },
            19: {
                'name': 'GPSDestLatitudeRef',
                'type': 'Ascii'
            },
            20: {
                'name': 'GPSDestLatitude',
                'type': 'Rational'
            },
            21: {
                'name': 'GPSDestLongitudeRef',
                'type': 'Ascii'
            },
            22: {
                'name': 'GPSDestLongitude',
                'type': 'Rational'
            },
            23: {
                'name': 'GPSDestBearingRef',
                'type': 'Ascii'
            },
            24: {
                'name': 'GPSDestBearing',
                'type': 'Rational'
            },
            25: {
                'name': 'GPSDestDistanceRef',
                'type': 'Ascii'
            },
            26: {
                'name': 'GPSDestDistance',
                'type': 'Rational'
            },
            27: {
                'name': 'GPSProcessingMethod',
                'type': 'Undefined'
            },
            28: {
                'name': 'GPSAreaInformation',
                'type': 'Undefined'
            },
            29: {
                'name': 'GPSDateStamp',
                'type': 'Ascii'
            },
            30: {
                'name': 'GPSDifferential',
                'type': 'Short'
            },
            31: {
                'name': 'GPSHPositioningError',
                'type': 'Rational'
            }
        },
        'Interop': {
            1: {
                'name': 'InteroperabilityIndex',
                'type': 'Ascii'
            }
        },
    };
    TAGS["0th"] = TAGS["Image"];
    TAGS["1st"] = TAGS["Image"];
    that.TAGS = TAGS;

    
    that.ImageIFD = {
        ProcessingSoftware:11,
        NewSubfileType:254,
        SubfileType:255,
        ImageWidth:256,
        ImageLength:257,
        BitsPerSample:258,
        Compression:259,
        PhotometricInterpretation:262,
        Threshholding:263,
        CellWidth:264,
        CellLength:265,
        FillOrder:266,
        DocumentName:269,
        ImageDescription:270,
        Make:271,
        Model:272,
        StripOffsets:273,
        Orientation:274,
        SamplesPerPixel:277,
        RowsPerStrip:278,
        StripByteCounts:279,
        XResolution:282,
        YResolution:283,
        PlanarConfiguration:284,
        GrayResponseUnit:290,
        GrayResponseCurve:291,
        T4Options:292,
        T6Options:293,
        ResolutionUnit:296,
        TransferFunction:301,
        Software:305,
        DateTime:306,
        Artist:315,
        HostComputer:316,
        Predictor:317,
        WhitePoint:318,
        PrimaryChromaticities:319,
        ColorMap:320,
        HalftoneHints:321,
        TileWidth:322,
        TileLength:323,
        TileOffsets:324,
        TileByteCounts:325,
        SubIFDs:330,
        InkSet:332,
        InkNames:333,
        NumberOfInks:334,
        DotRange:336,
        TargetPrinter:337,
        ExtraSamples:338,
        SampleFormat:339,
        SMinSampleValue:340,
        SMaxSampleValue:341,
        TransferRange:342,
        ClipPath:343,
        XClipPathUnits:344,
        YClipPathUnits:345,
        Indexed:346,
        JPEGTables:347,
        OPIProxy:351,
        JPEGProc:512,
        JPEGInterchangeFormat:513,
        JPEGInterchangeFormatLength:514,
        JPEGRestartInterval:515,
        JPEGLosslessPredictors:517,
        JPEGPointTransforms:518,
        JPEGQTables:519,
        JPEGDCTables:520,
        JPEGACTables:521,
        YCbCrCoefficients:529,
        YCbCrSubSampling:530,
        YCbCrPositioning:531,
        ReferenceBlackWhite:532,
        XMLPacket:700,
        Rating:18246,
        RatingPercent:18249,
        ImageID:32781,
        CFARepeatPatternDim:33421,
        CFAPattern:33422,
        BatteryLevel:33423,
        Copyright:33432,
        ExposureTime:33434,
        ImageResources:34377,
        ExifTag:34665,
        InterColorProfile:34675,
        GPSTag:34853,
        Interlace:34857,
        TimeZoneOffset:34858,
        SelfTimerMode:34859,
        FlashEnergy:37387,
        SpatialFrequencyResponse:37388,
        Noise:37389,
        FocalPlaneXResolution:37390,
        FocalPlaneYResolution:37391,
        FocalPlaneResolutionUnit:37392,
        ImageNumber:37393,
        SecurityClassification:37394,
        ImageHistory:37395,
        ExposureIndex:37397,
        TIFFEPStandardID:37398,
        SensingMethod:37399,
        XPTitle:40091,
        XPComment:40092,
        XPAuthor:40093,
        XPKeywords:40094,
        XPSubject:40095,
        PrintImageMatching:50341,
        DNGVersion:50706,
        DNGBackwardVersion:50707,
        UniqueCameraModel:50708,
        LocalizedCameraModel:50709,
        CFAPlaneColor:50710,
        CFALayout:50711,
        LinearizationTable:50712,
        BlackLevelRepeatDim:50713,
        BlackLevel:50714,
        BlackLevelDeltaH:50715,
        BlackLevelDeltaV:50716,
        WhiteLevel:50717,
        DefaultScale:50718,
        DefaultCropOrigin:50719,
        DefaultCropSize:50720,
        ColorMatrix1:50721,
        ColorMatrix2:50722,
        CameraCalibration1:50723,
        CameraCalibration2:50724,
        ReductionMatrix1:50725,
        ReductionMatrix2:50726,
        AnalogBalance:50727,
        AsShotNeutral:50728,
        AsShotWhiteXY:50729,
        BaselineExposure:50730,
        BaselineNoise:50731,
        BaselineSharpness:50732,
        BayerGreenSplit:50733,
        LinearResponseLimit:50734,
        CameraSerialNumber:50735,
        LensInfo:50736,
        ChromaBlurRadius:50737,
        AntiAliasStrength:50738,
        ShadowScale:50739,
        DNGPrivateData:50740,
        MakerNoteSafety:50741,
        CalibrationIlluminant1:50778,
        CalibrationIlluminant2:50779,
        BestQualityScale:50780,
        RawDataUniqueID:50781,
        OriginalRawFileName:50827,
        OriginalRawFileData:50828,
        ActiveArea:50829,
        MaskedAreas:50830,
        AsShotICCProfile:50831,
        AsShotPreProfileMatrix:50832,
        CurrentICCProfile:50833,
        CurrentPreProfileMatrix:50834,
        ColorimetricReference:50879,
        CameraCalibrationSignature:50931,
        ProfileCalibrationSignature:50932,
        AsShotProfileName:50934,
        NoiseReductionApplied:50935,
        ProfileName:50936,
        ProfileHueSatMapDims:50937,
        ProfileHueSatMapData1:50938,
        ProfileHueSatMapData2:50939,
        ProfileToneCurve:50940,
        ProfileEmbedPolicy:50941,
        ProfileCopyright:50942,
        ForwardMatrix1:50964,
        ForwardMatrix2:50965,
        PreviewApplicationName:50966,
        PreviewApplicationVersion:50967,
        PreviewSettingsName:50968,
        PreviewSettingsDigest:50969,
        PreviewColorSpace:50970,
        PreviewDateTime:50971,
        RawImageDigest:50972,
        OriginalRawFileDigest:50973,
        SubTileBlockSize:50974,
        RowInterleaveFactor:50975,
        ProfileLookTableDims:50981,
        ProfileLookTableData:50982,
        OpcodeList1:51008,
        OpcodeList2:51009,
        OpcodeList3:51022,
        NoiseProfile:51041,
    };

    
    that.ExifIFD = {
        ExposureTime:33434,
        FNumber:33437,
        ExposureProgram:34850,
        SpectralSensitivity:34852,
        ISOSpeedRatings:34855,
        OECF:34856,
        SensitivityType:34864,
        StandardOutputSensitivity:34865,
        RecommendedExposureIndex:34866,
        ISOSpeed:34867,
        ISOSpeedLatitudeyyy:34868,
        ISOSpeedLatitudezzz:34869,
        ExifVersion:36864,
        DateTimeOriginal:36867,
        DateTimeDigitized:36868,
        ComponentsConfiguration:37121,
        CompressedBitsPerPixel:37122,
        ShutterSpeedValue:37377,
        ApertureValue:37378,
        BrightnessValue:37379,
        ExposureBiasValue:37380,
        MaxApertureValue:37381,
        SubjectDistance:37382,
        MeteringMode:37383,
        LightSource:37384,
        Flash:37385,
        FocalLength:37386,
        SubjectArea:37396,
        MakerNote:37500,
        UserComment:37510,
        SubSecTime:37520,
        SubSecTimeOriginal:37521,
        SubSecTimeDigitized:37522,
        FlashpixVersion:40960,
        ColorSpace:40961,
        PixelXDimension:40962,
        PixelYDimension:40963,
        RelatedSoundFile:40964,
        InteroperabilityTag:40965,
        FlashEnergy:41483,
        SpatialFrequencyResponse:41484,
        FocalPlaneXResolution:41486,
        FocalPlaneYResolution:41487,
        FocalPlaneResolutionUnit:41488,
        SubjectLocation:41492,
        ExposureIndex:41493,
        SensingMethod:41495,
        FileSource:41728,
        SceneType:41729,
        CFAPattern:41730,
        CustomRendered:41985,
        ExposureMode:41986,
        WhiteBalance:41987,
        DigitalZoomRatio:41988,
        FocalLengthIn35mmFilm:41989,
        SceneCaptureType:41990,
        GainControl:41991,
        Contrast:41992,
        Saturation:41993,
        Sharpness:41994,
        DeviceSettingDescription:41995,
        SubjectDistanceRange:41996,
        ImageUniqueID:42016,
        CameraOwnerName:42032,
        BodySerialNumber:42033,
        LensSpecification:42034,
        LensMake:42035,
        LensModel:42036,
        LensSerialNumber:42037,
        Gamma:42240,
    };


    that.GPSIFD = {
        GPSVersionID:0,
        GPSLatitudeRef:1,
        GPSLatitude:2,
        GPSLongitudeRef:3,
        GPSLongitude:4,
        GPSAltitudeRef:5,
        GPSAltitude:6,
        GPSTimeStamp:7,
        GPSSatellites:8,
        GPSStatus:9,
        GPSMeasureMode:10,
        GPSDOP:11,
        GPSSpeedRef:12,
        GPSSpeed:13,
        GPSTrackRef:14,
        GPSTrack:15,
        GPSImgDirectionRef:16,
        GPSImgDirection:17,
        GPSMapDatum:18,
        GPSDestLatitudeRef:19,
        GPSDestLatitude:20,
        GPSDestLongitudeRef:21,
        GPSDestLongitude:22,
        GPSDestBearingRef:23,
        GPSDestBearing:24,
        GPSDestDistanceRef:25,
        GPSDestDistance:26,
        GPSProcessingMethod:27,
        GPSAreaInformation:28,
        GPSDateStamp:29,
        GPSDifferential:30,
        GPSHPositioningError:31,
    };


    that.InteropIFD = {
        InteroperabilityIndex:1,
    };

    that.GPSHelper = {
        degToDmsRational:function (degFloat) {
            var minFloat = degFloat % 1 * 60;
            var secFloat = minFloat % 1 * 60;
            var deg = Math.floor(degFloat);
            var min = Math.floor(minFloat);
            var sec = Math.round(secFloat * 100);

            return [[deg, 1], [min, 1], [sec, 100]];
        }
    };
    
    
    if (typeof exports !== 'undefined') {
        if (typeof module !== 'undefined' && module.exports) {
            exports = module.exports = that;
        }
        exports.piexif = that;
    } else {
        window.piexif = that;
    }

})();

(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
	typeof define === 'function' && define.amd ? define(factory) :
	(global.DOMPurify = factory());
}(this, (function () { 'use strict';

var html = ['a', 'abbr', 'acronym', 'address', 'area', 'article', 'aside', 'audio', 'b', 'bdi', 'bdo', 'big', 'blink', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'content', 'data', 'datalist', 'dd', 'decorator', 'del', 'details', 'dfn', 'dir', 'div', 'dl', 'dt', 'element', 'em', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'img', 'input', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'marquee', 'menu', 'menuitem', 'meter', 'nav', 'nobr', 'ol', 'optgroup', 'option', 'output', 'p', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'section', 'select', 'shadow', 'small', 'source', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr'];

// SVG
var svg = ['svg', 'a', 'altglyph', 'altglyphdef', 'altglyphitem', 'animatecolor', 'animatemotion', 'animatetransform', 'audio', 'canvas', 'circle', 'clippath', 'defs', 'desc', 'ellipse', 'filter', 'font', 'g', 'glyph', 'glyphref', 'hkern', 'image', 'line', 'lineargradient', 'marker', 'mask', 'metadata', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialgradient', 'rect', 'stop', 'style', 'switch', 'symbol', 'text', 'textpath', 'title', 'tref', 'tspan', 'video', 'view', 'vkern'];

var svgFilters = ['feBlend', 'feColorMatrix', 'feComponentTransfer', 'feComposite', 'feConvolveMatrix', 'feDiffuseLighting', 'feDisplacementMap', 'feDistantLight', 'feFlood', 'feFuncA', 'feFuncB', 'feFuncG', 'feFuncR', 'feGaussianBlur', 'feMerge', 'feMergeNode', 'feMorphology', 'feOffset', 'fePointLight', 'feSpecularLighting', 'feSpotLight', 'feTile', 'feTurbulence'];

var mathMl = ['math', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mmuliscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mpspace', 'msqrt', 'mystyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover'];

var text = ['#text'];

var html$1 = ['accept', 'action', 'align', 'alt', 'autocomplete', 'background', 'bgcolor', 'border', 'cellpadding', 'cellspacing', 'checked', 'cite', 'class', 'clear', 'color', 'cols', 'colspan', 'coords', 'crossorigin', 'datetime', 'default', 'dir', 'disabled', 'download', 'enctype', 'face', 'for', 'headers', 'height', 'hidden', 'high', 'href', 'hreflang', 'id', 'integrity', 'ismap', 'label', 'lang', 'list', 'loop', 'low', 'max', 'maxlength', 'media', 'method', 'min', 'multiple', 'name', 'noshade', 'novalidate', 'nowrap', 'open', 'optimum', 'pattern', 'placeholder', 'poster', 'preload', 'pubdate', 'radiogroup', 'readonly', 'rel', 'required', 'rev', 'reversed', 'role', 'rows', 'rowspan', 'spellcheck', 'scope', 'selected', 'shape', 'size', 'sizes', 'span', 'srclang', 'start', 'src', 'srcset', 'step', 'style', 'summary', 'tabindex', 'title', 'type', 'usemap', 'valign', 'value', 'width', 'xmlns'];

var svg$1 = ['accent-height', 'accumulate', 'additivive', 'alignment-baseline', 'ascent', 'attributename', 'attributetype', 'azimuth', 'basefrequency', 'baseline-shift', 'begin', 'bias', 'by', 'class', 'clip', 'clip-path', 'clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cx', 'cy', 'd', 'dx', 'dy', 'diffuseconstant', 'direction', 'display', 'divisor', 'dur', 'edgemode', 'elevation', 'end', 'fill', 'fill-opacity', 'fill-rule', 'filter', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'fx', 'fy', 'g1', 'g2', 'glyph-name', 'glyphref', 'gradientunits', 'gradienttransform', 'height', 'href', 'id', 'image-rendering', 'in', 'in2', 'k', 'k1', 'k2', 'k3', 'k4', 'kerning', 'keypoints', 'keysplines', 'keytimes', 'lang', 'lengthadjust', 'letter-spacing', 'kernelmatrix', 'kernelunitlength', 'lighting-color', 'local', 'marker-end', 'marker-mid', 'marker-start', 'markerheight', 'markerunits', 'markerwidth', 'maskcontentunits', 'maskunits', 'max', 'mask', 'media', 'method', 'mode', 'min', 'name', 'numoctaves', 'offset', 'operator', 'opacity', 'order', 'orient', 'orientation', 'origin', 'overflow', 'paint-order', 'path', 'pathlength', 'patterncontentunits', 'patterntransform', 'patternunits', 'points', 'preservealpha', 'preserveaspectratio', 'r', 'rx', 'ry', 'radius', 'refx', 'refy', 'repeatcount', 'repeatdur', 'restart', 'result', 'rotate', 'scale', 'seed', 'shape-rendering', 'specularconstant', 'specularexponent', 'spreadmethod', 'stddeviation', 'stitchtiles', 'stop-color', 'stop-opacity', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke', 'stroke-width', 'style', 'surfacescale', 'tabindex', 'targetx', 'targety', 'transform', 'text-anchor', 'text-decoration', 'text-rendering', 'textlength', 'type', 'u1', 'u2', 'unicode', 'values', 'viewbox', 'visibility', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'width', 'word-spacing', 'wrap', 'writing-mode', 'xchannelselector', 'ychannelselector', 'x', 'x1', 'x2', 'xmlns', 'y', 'y1', 'y2', 'z', 'zoomandpan'];

var mathMl$1 = ['accent', 'accentunder', 'align', 'bevelled', 'close', 'columnsalign', 'columnlines', 'columnspan', 'denomalign', 'depth', 'dir', 'display', 'displaystyle', 'fence', 'frame', 'height', 'href', 'id', 'largeop', 'length', 'linethickness', 'lspace', 'lquote', 'mathbackground', 'mathcolor', 'mathsize', 'mathvariant', 'maxsize', 'minsize', 'movablelimits', 'notation', 'numalign', 'open', 'rowalign', 'rowlines', 'rowspacing', 'rowspan', 'rspace', 'rquote', 'scriptlevel', 'scriptminsize', 'scriptsizemultiplier', 'selection', 'separator', 'separators', 'stretchy', 'subscriptshift', 'supscriptshift', 'symmetric', 'voffset', 'width', 'xmlns'];

var xml = ['xlink:href', 'xml:id', 'xlink:title', 'xml:space', 'xmlns:xlink'];

/* Add properties to a lookup table */
function addToSet(set, array) {
  var l = array.length;
  while (l--) {
    if (typeof array[l] === 'string') {
      array[l] = array[l].toLowerCase();
    }
    set[array[l]] = true;
  }
  return set;
}

/* Shallow clone an object */
function clone(object) {
  var newObject = {};
  var property = void 0;
  for (property in object) {
    if (Object.prototype.hasOwnProperty.call(object, property)) {
      newObject[property] = object[property];
    }
  }
  return newObject;
}

var MUSTACHE_EXPR = /\{\{[\s\S]*|[\s\S]*\}\}/gm; // Specify template detection regex for SAFE_FOR_TEMPLATES mode
var ERB_EXPR = /<%[\s\S]*|[\s\S]*%>/gm;
var DATA_ATTR = /^data-[\-\w.\u00B7-\uFFFF]/; // eslint-disable-line no-useless-escape
var ARIA_ATTR = /^aria-[\-\w]+$/; // eslint-disable-line no-useless-escape
var IS_ALLOWED_URI = /^(?:(?:(?:f|ht)tps?|mailto|tel|callto|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i; // eslint-disable-line no-useless-escape
var IS_SCRIPT_OR_DATA = /^(?:\w+script|data):/i;
var ATTR_WHITESPACE = /[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205f\u3000]/g; // eslint-disable-line no-control-regex

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

var getGlobal = function getGlobal() {
  return typeof window === 'undefined' ? null : window;
};

function createDOMPurify() {
  var window = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : getGlobal();

  var DOMPurify = function DOMPurify(root) {
    return createDOMPurify(root);
  };

  /**
   * Version label, exposed for easier checks
   * if DOMPurify is up to date or not
   */
  DOMPurify.version = '1.0.7';

  /**
   * Array of elements that DOMPurify removed during sanitation.
   * Empty if nothing was removed.
   */
  DOMPurify.removed = [];

  if (!window || !window.document || window.document.nodeType !== 9) {
    // Not running in a browser, provide a factory function
    // so that you can pass your own Window
    DOMPurify.isSupported = false;

    return DOMPurify;
  }

  var originalDocument = window.document;
  var useDOMParser = false; // See comment below
  var removeTitle = false; // See comment below

  var document = window.document;
  var DocumentFragment = window.DocumentFragment,
      HTMLTemplateElement = window.HTMLTemplateElement,
      Node = window.Node,
      NodeFilter = window.NodeFilter,
      _window$NamedNodeMap = window.NamedNodeMap,
      NamedNodeMap = _window$NamedNodeMap === undefined ? window.NamedNodeMap || window.MozNamedAttrMap : _window$NamedNodeMap,
      Text = window.Text,
      Comment = window.Comment,
      DOMParser = window.DOMParser;

  // As per issue #47, the web-components registry is inherited by a
  // new document created via createHTMLDocument. As per the spec
  // (http://w3c.github.io/webcomponents/spec/custom/#creating-and-passing-registries)
  // a new empty registry is used when creating a template contents owner
  // document, so we use that as our parent document to ensure nothing
  // is inherited.

  if (typeof HTMLTemplateElement === 'function') {
    var template = document.createElement('template');
    if (template.content && template.content.ownerDocument) {
      document = template.content.ownerDocument;
    }
  }

  var _document = document,
      implementation = _document.implementation,
      createNodeIterator = _document.createNodeIterator,
      getElementsByTagName = _document.getElementsByTagName,
      createDocumentFragment = _document.createDocumentFragment;
  var importNode = originalDocument.importNode;


  var hooks = {};

  /**
   * Expose whether this browser supports running the full DOMPurify.
   */
  DOMPurify.isSupported = implementation && typeof implementation.createHTMLDocument !== 'undefined' && document.documentMode !== 9;

  var MUSTACHE_EXPR$$1 = MUSTACHE_EXPR,
      ERB_EXPR$$1 = ERB_EXPR,
      DATA_ATTR$$1 = DATA_ATTR,
      ARIA_ATTR$$1 = ARIA_ATTR,
      IS_SCRIPT_OR_DATA$$1 = IS_SCRIPT_OR_DATA,
      ATTR_WHITESPACE$$1 = ATTR_WHITESPACE;
  var IS_ALLOWED_URI$$1 = IS_ALLOWED_URI;
  /**
   * We consider the elements and attributes below to be safe. Ideally
   * don't add any new ones but feel free to remove unwanted ones.
   */

  /* allowed element names */

  var ALLOWED_TAGS = null;
  var DEFAULT_ALLOWED_TAGS = addToSet({}, [].concat(_toConsumableArray(html), _toConsumableArray(svg), _toConsumableArray(svgFilters), _toConsumableArray(mathMl), _toConsumableArray(text)));

  /* Allowed attribute names */
  var ALLOWED_ATTR = null;
  var DEFAULT_ALLOWED_ATTR = addToSet({}, [].concat(_toConsumableArray(html$1), _toConsumableArray(svg$1), _toConsumableArray(mathMl$1), _toConsumableArray(xml)));

  /* Explicitly forbidden tags (overrides ALLOWED_TAGS/ADD_TAGS) */
  var FORBID_TAGS = null;

  /* Explicitly forbidden attributes (overrides ALLOWED_ATTR/ADD_ATTR) */
  var FORBID_ATTR = null;

  /* Decide if ARIA attributes are okay */
  var ALLOW_ARIA_ATTR = true;

  /* Decide if custom data attributes are okay */
  var ALLOW_DATA_ATTR = true;

  /* Decide if unknown protocols are okay */
  var ALLOW_UNKNOWN_PROTOCOLS = false;

  /* Output should be safe for jQuery's $() factory? */
  var SAFE_FOR_JQUERY = false;

  /* Output should be safe for common template engines.
   * This means, DOMPurify removes data attributes, mustaches and ERB
   */
  var SAFE_FOR_TEMPLATES = false;

  /* Decide if document with <html>... should be returned */
  var WHOLE_DOCUMENT = false;

  /* Track whether config is already set on this instance of DOMPurify. */
  var SET_CONFIG = false;

  /* Decide if all elements (e.g. style, script) must be children of
   * document.body. By default, browsers might move them to document.head */
  var FORCE_BODY = false;

  /* Decide if a DOM `HTMLBodyElement` should be returned, instead of a html string.
   * If `WHOLE_DOCUMENT` is enabled a `HTMLHtmlElement` will be returned instead
   */
  var RETURN_DOM = false;

  /* Decide if a DOM `DocumentFragment` should be returned, instead of a html string */
  var RETURN_DOM_FRAGMENT = false;

  /* If `RETURN_DOM` or `RETURN_DOM_FRAGMENT` is enabled, decide if the returned DOM
   * `Node` is imported into the current `Document`. If this flag is not enabled the
   * `Node` will belong (its ownerDocument) to a fresh `HTMLDocument`, created by
   * DOMPurify. */
  var RETURN_DOM_IMPORT = false;

  /* Output should be free from DOM clobbering attacks? */
  var SANITIZE_DOM = true;

  /* Keep element content when removing element? */
  var KEEP_CONTENT = true;

  /* If a `Node` is passed to sanitize(), then performs sanitization in-place instead
   * of importing it into a new Document and returning a sanitized copy */
  var IN_PLACE = false;

  /* Allow usage of profiles like html, svg and mathMl */
  var USE_PROFILES = {};

  /* Tags to ignore content of when KEEP_CONTENT is true */
  var FORBID_CONTENTS = addToSet({}, ['audio', 'head', 'math', 'script', 'style', 'template', 'svg', 'video']);

  /* Tags that are safe for data: URIs */
  var DATA_URI_TAGS = addToSet({}, ['audio', 'video', 'img', 'source', 'image']);

  /* Attributes safe for values like "javascript:" */
  var URI_SAFE_ATTRIBUTES = addToSet({}, ['alt', 'class', 'for', 'id', 'label', 'name', 'pattern', 'placeholder', 'summary', 'title', 'value', 'style', 'xmlns']);

  /* Keep a reference to config to pass to hooks */
  var CONFIG = null;

  /* Ideally, do not touch anything below this line */
  /* ______________________________________________ */

  var formElement = document.createElement('form');

  /**
   * _parseConfig
   *
   * @param  {Object} cfg optional config literal
   */
  // eslint-disable-next-line complexity
  var _parseConfig = function _parseConfig(cfg) {
    /* Shield configuration object from tampering */
    if ((typeof cfg === 'undefined' ? 'undefined' : _typeof(cfg)) !== 'object') {
      cfg = {};
    }
    /* Set configuration parameters */
    ALLOWED_TAGS = 'ALLOWED_TAGS' in cfg ? addToSet({}, cfg.ALLOWED_TAGS) : DEFAULT_ALLOWED_TAGS;
    ALLOWED_ATTR = 'ALLOWED_ATTR' in cfg ? addToSet({}, cfg.ALLOWED_ATTR) : DEFAULT_ALLOWED_ATTR;
    FORBID_TAGS = 'FORBID_TAGS' in cfg ? addToSet({}, cfg.FORBID_TAGS) : {};
    FORBID_ATTR = 'FORBID_ATTR' in cfg ? addToSet({}, cfg.FORBID_ATTR) : {};
    USE_PROFILES = 'USE_PROFILES' in cfg ? cfg.USE_PROFILES : false;
    ALLOW_ARIA_ATTR = cfg.ALLOW_ARIA_ATTR !== false; // Default true
    ALLOW_DATA_ATTR = cfg.ALLOW_DATA_ATTR !== false; // Default true
    ALLOW_UNKNOWN_PROTOCOLS = cfg.ALLOW_UNKNOWN_PROTOCOLS || false; // Default false
    SAFE_FOR_JQUERY = cfg.SAFE_FOR_JQUERY || false; // Default false
    SAFE_FOR_TEMPLATES = cfg.SAFE_FOR_TEMPLATES || false; // Default false
    WHOLE_DOCUMENT = cfg.WHOLE_DOCUMENT || false; // Default false
    RETURN_DOM = cfg.RETURN_DOM || false; // Default false
    RETURN_DOM_FRAGMENT = cfg.RETURN_DOM_FRAGMENT || false; // Default false
    RETURN_DOM_IMPORT = cfg.RETURN_DOM_IMPORT || false; // Default false
    FORCE_BODY = cfg.FORCE_BODY || false; // Default false
    SANITIZE_DOM = cfg.SANITIZE_DOM !== false; // Default true
    KEEP_CONTENT = cfg.KEEP_CONTENT !== false; // Default true
    IN_PLACE = cfg.IN_PLACE || false; // Default false

    IS_ALLOWED_URI$$1 = cfg.ALLOWED_URI_REGEXP || IS_ALLOWED_URI$$1;

    if (SAFE_FOR_TEMPLATES) {
      ALLOW_DATA_ATTR = false;
    }

    if (RETURN_DOM_FRAGMENT) {
      RETURN_DOM = true;
    }

    /* Parse profile info */
    if (USE_PROFILES) {
      ALLOWED_TAGS = addToSet({}, [].concat(_toConsumableArray(text)));
      ALLOWED_ATTR = [];
      if (USE_PROFILES.html === true) {
        addToSet(ALLOWED_TAGS, html);
        addToSet(ALLOWED_ATTR, html$1);
      }
      if (USE_PROFILES.svg === true) {
        addToSet(ALLOWED_TAGS, svg);
        addToSet(ALLOWED_ATTR, svg$1);
        addToSet(ALLOWED_ATTR, xml);
      }
      if (USE_PROFILES.svgFilters === true) {
        addToSet(ALLOWED_TAGS, svgFilters);
        addToSet(ALLOWED_ATTR, svg$1);
        addToSet(ALLOWED_ATTR, xml);
      }
      if (USE_PROFILES.mathMl === true) {
        addToSet(ALLOWED_TAGS, mathMl);
        addToSet(ALLOWED_ATTR, mathMl$1);
        addToSet(ALLOWED_ATTR, xml);
      }
    }

    /* Merge configuration parameters */
    if (cfg.ADD_TAGS) {
      if (ALLOWED_TAGS === DEFAULT_ALLOWED_TAGS) {
        ALLOWED_TAGS = clone(ALLOWED_TAGS);
      }
      addToSet(ALLOWED_TAGS, cfg.ADD_TAGS);
    }
    if (cfg.ADD_ATTR) {
      if (ALLOWED_ATTR === DEFAULT_ALLOWED_ATTR) {
        ALLOWED_ATTR = clone(ALLOWED_ATTR);
      }
      addToSet(ALLOWED_ATTR, cfg.ADD_ATTR);
    }
    if (cfg.ADD_URI_SAFE_ATTR) {
      addToSet(URI_SAFE_ATTRIBUTES, cfg.ADD_URI_SAFE_ATTR);
    }

    /* Add #text in case KEEP_CONTENT is set to true */
    if (KEEP_CONTENT) {
      ALLOWED_TAGS['#text'] = true;
    }

    /* Add html, head and body to ALLOWED_TAGS in case WHOLE_DOCUMENT is true */
    if (WHOLE_DOCUMENT) {
      addToSet(ALLOWED_TAGS, ['html', 'head', 'body']);
    }

    /* Add tbody to ALLOWED_TAGS in case tables are permitted, see #286 */
    if (ALLOWED_TAGS.table) {
      addToSet(ALLOWED_TAGS, ['tbody']);
    }

    // Prevent further manipulation of configuration.
    // Not available in IE8, Safari 5, etc.
    if (Object && 'freeze' in Object) {
      Object.freeze(cfg);
    }

    CONFIG = cfg;
  };

  /**
   * _forceRemove
   *
   * @param  {Node} node a DOM node
   */
  var _forceRemove = function _forceRemove(node) {
    DOMPurify.removed.push({ element: node });
    try {
      node.parentNode.removeChild(node);
    } catch (err) {
      node.outerHTML = '';
    }
  };

  /**
   * _removeAttribute
   *
   * @param  {String} name an Attribute name
   * @param  {Node} node a DOM node
   */
  var _removeAttribute = function _removeAttribute(name, node) {
    try {
      DOMPurify.removed.push({
        attribute: node.getAttributeNode(name),
        from: node
      });
    } catch (err) {
      DOMPurify.removed.push({
        attribute: null,
        from: node
      });
    }
    node.removeAttribute(name);
  };

  /**
   * _initDocument
   *
   * @param  {String} dirty a string of dirty markup
   * @return {Document} a DOM, filled with the dirty markup
   */
  var _initDocument = function _initDocument(dirty) {
    /* Create a HTML document */
    var doc = void 0;

    if (FORCE_BODY) {
      dirty = '<remove></remove>' + dirty;
    }

    /* Use DOMParser to workaround Firefox bug (see comment below) */
    if (useDOMParser) {
      try {
        doc = new DOMParser().parseFromString(dirty, 'text/html');
      } catch (err) {}
    }

    /* Remove title to fix an mXSS bug in older MS Edge */
    if (removeTitle) {
      addToSet(FORBID_TAGS, ['title']);
    }

    /* Otherwise use createHTMLDocument, because DOMParser is unsafe in
    Safari (see comment below) */
    if (!doc || !doc.documentElement) {
      doc = implementation.createHTMLDocument('');
      var _doc = doc,
          body = _doc.body;

      body.parentNode.removeChild(body.parentNode.firstElementChild);
      body.outerHTML = dirty;
    }

    /* Work on whole document or just its body */
    return getElementsByTagName.call(doc, WHOLE_DOCUMENT ? 'html' : 'body')[0];
  };

  // Firefox uses a different parser for innerHTML rather than
  // DOMParser (see https://bugzilla.mozilla.org/show_bug.cgi?id=1205631)
  // which means that you *must* use DOMParser, otherwise the output may
  // not be safe if used in a document.write context later.
  //
  // So we feature detect the Firefox bug and use the DOMParser if necessary.
  //
  // MS Edge, in older versions, is affected by an mXSS behavior. The second
  // check tests for the behavior and fixes it if necessary.
  if (DOMPurify.isSupported) {
    (function () {
      try {
        var doc = _initDocument('<svg><p><style><img src="</style><img src=x onerror=alert(1)//">');
        if (doc.querySelector('svg img')) {
          useDOMParser = true;
        }
      } catch (err) {}
    })();
    (function () {
      try {
        var doc = _initDocument('<x/><title>&lt;/title&gt;&lt;img&gt;');
        if (doc.querySelector('title').textContent.match(/<\/title/)) {
          removeTitle = true;
        }
      } catch (err) {}
    })();
  }

  /**
   * _createIterator
   *
   * @param  {Document} root document/fragment to create iterator for
   * @return {Iterator} iterator instance
   */
  var _createIterator = function _createIterator(root) {
    return createNodeIterator.call(root.ownerDocument || root, root, NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_COMMENT | NodeFilter.SHOW_TEXT, function () {
      return NodeFilter.FILTER_ACCEPT;
    }, false);
  };

  /**
   * _isClobbered
   *
   * @param  {Node} elm element to check for clobbering attacks
   * @return {Boolean} true if clobbered, false if safe
   */
  var _isClobbered = function _isClobbered(elm) {
    if (elm instanceof Text || elm instanceof Comment) {
      return false;
    }
    if (typeof elm.nodeName !== 'string' || typeof elm.textContent !== 'string' || typeof elm.removeChild !== 'function' || !(elm.attributes instanceof NamedNodeMap) || typeof elm.removeAttribute !== 'function' || typeof elm.setAttribute !== 'function') {
      return true;
    }
    return false;
  };

  /**
   * _isNode
   *
   * @param  {Node} obj object to check whether it's a DOM node
   * @return {Boolean} true is object is a DOM node
   */
  var _isNode = function _isNode(obj) {
    return (typeof Node === 'undefined' ? 'undefined' : _typeof(Node)) === 'object' ? obj instanceof Node : obj && (typeof obj === 'undefined' ? 'undefined' : _typeof(obj)) === 'object' && typeof obj.nodeType === 'number' && typeof obj.nodeName === 'string';
  };

  /**
   * _executeHook
   * Execute user configurable hooks
   *
   * @param  {String} entryPoint  Name of the hook's entry point
   * @param  {Node} currentNode node to work on with the hook
   * @param  {Object} data additional hook parameters
   */
  var _executeHook = function _executeHook(entryPoint, currentNode, data) {
    if (!hooks[entryPoint]) {
      return;
    }

    hooks[entryPoint].forEach(function (hook) {
      hook.call(DOMPurify, currentNode, data, CONFIG);
    });
  };

  /**
   * _sanitizeElements
   *
   * @protect nodeName
   * @protect textContent
   * @protect removeChild
   *
   * @param   {Node} currentNode to check for permission to exist
   * @return  {Boolean} true if node was killed, false if left alive
   */
  var _sanitizeElements = function _sanitizeElements(currentNode) {
    var content = void 0;

    /* Execute a hook if present */
    _executeHook('beforeSanitizeElements', currentNode, null);

    /* Check if element is clobbered or can clobber */
    if (_isClobbered(currentNode)) {
      _forceRemove(currentNode);
      return true;
    }

    /* Now let's check the element's type and name */
    var tagName = currentNode.nodeName.toLowerCase();

    /* Execute a hook if present */
    _executeHook('uponSanitizeElement', currentNode, {
      tagName: tagName,
      allowedTags: ALLOWED_TAGS
    });

    /* Remove element if anything forbids its presence */
    if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
      /* Keep content except for black-listed elements */
      if (KEEP_CONTENT && !FORBID_CONTENTS[tagName] && typeof currentNode.insertAdjacentHTML === 'function') {
        try {
          currentNode.insertAdjacentHTML('AfterEnd', currentNode.innerHTML);
        } catch (err) {}
      }
      _forceRemove(currentNode);
      return true;
    }

    /* Convert markup to cover jQuery behavior */
    if (SAFE_FOR_JQUERY && !currentNode.firstElementChild && (!currentNode.content || !currentNode.content.firstElementChild) && /</g.test(currentNode.textContent)) {
      DOMPurify.removed.push({ element: currentNode.cloneNode() });
      if (currentNode.innerHTML) {
        currentNode.innerHTML = currentNode.innerHTML.replace(/</g, '&lt;');
      } else {
        currentNode.innerHTML = currentNode.textContent.replace(/</g, '&lt;');
      }
    }

    /* Sanitize element content to be template-safe */
    if (SAFE_FOR_TEMPLATES && currentNode.nodeType === 3) {
      /* Get the element's text content */
      content = currentNode.textContent;
      content = content.replace(MUSTACHE_EXPR$$1, ' ');
      content = content.replace(ERB_EXPR$$1, ' ');
      if (currentNode.textContent !== content) {
        DOMPurify.removed.push({ element: currentNode.cloneNode() });
        currentNode.textContent = content;
      }
    }

    /* Execute a hook if present */
    _executeHook('afterSanitizeElements', currentNode, null);

    return false;
  };

  /**
   * _isValidAttribute
   *
   * @param  {string} lcTag Lowercase tag name of containing element.
   * @param  {string} lcName Lowercase attribute name.
   * @param  {string} value Attribute value.
   * @return {Boolean} Returns true if `value` is valid, otherwise false.
   */
  var _isValidAttribute = function _isValidAttribute(lcTag, lcName, value) {
    /* Make sure attribute cannot clobber */
    if (SANITIZE_DOM && (lcName === 'id' || lcName === 'name') && (value in document || value in formElement)) {
      return false;
    }

    /* Sanitize attribute content to be template-safe */
    if (SAFE_FOR_TEMPLATES) {
      value = value.replace(MUSTACHE_EXPR$$1, ' ');
      value = value.replace(ERB_EXPR$$1, ' ');
    }

    /* Allow valid data-* attributes: At least one character after "-"
        (https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes)
        XML-compatible (https://html.spec.whatwg.org/multipage/infrastructure.html#xml-compatible and http://www.w3.org/TR/xml/#d0e804)
        We don't need to check the value; it's always URI safe. */
    if (ALLOW_DATA_ATTR && DATA_ATTR$$1.test(lcName)) {
      // This attribute is safe
    } else if (ALLOW_ARIA_ATTR && ARIA_ATTR$$1.test(lcName)) {
      // This attribute is safe
      /* Otherwise, check the name is permitted */
    } else if (!ALLOWED_ATTR[lcName] || FORBID_ATTR[lcName]) {
      return false;

      /* Check value is safe. First, is attr inert? If so, is safe */
    } else if (URI_SAFE_ATTRIBUTES[lcName]) {
      // This attribute is safe
      /* Check no script, data or unknown possibly unsafe URI
        unless we know URI values are safe for that attribute */
    } else if (IS_ALLOWED_URI$$1.test(value.replace(ATTR_WHITESPACE$$1, ''))) {
      // This attribute is safe
      /* Keep image data URIs alive if src/xlink:href is allowed */
    } else if ((lcName === 'src' || lcName === 'xlink:href') && value.indexOf('data:') === 0 && DATA_URI_TAGS[lcTag]) {
      // This attribute is safe
      /* Allow unknown protocols: This provides support for links that
        are handled by protocol handlers which may be unknown ahead of
        time, e.g. fb:, spotify: */
    } else if (ALLOW_UNKNOWN_PROTOCOLS && !IS_SCRIPT_OR_DATA$$1.test(value.replace(ATTR_WHITESPACE$$1, ''))) {
      // This attribute is safe
      /* Check for binary attributes */
      // eslint-disable-next-line no-negated-condition
    } else if (!value) {
      // Binary attributes are safe at this point
      /* Anything else, presume unsafe, do not add it back */
    } else {
      return false;
    }
    return true;
  };

  /**
   * _sanitizeAttributes
   *
   * @protect attributes
   * @protect nodeName
   * @protect removeAttribute
   * @protect setAttribute
   *
   * @param  {Node} node to sanitize
   */
  // eslint-disable-next-line complexity
  var _sanitizeAttributes = function _sanitizeAttributes(currentNode) {
    var attr = void 0;
    var value = void 0;
    var lcName = void 0;
    var idAttr = void 0;
    var l = void 0;
    /* Execute a hook if present */
    _executeHook('beforeSanitizeAttributes', currentNode, null);

    var attributes = currentNode.attributes;

    /* Check if we have attributes; if not we might have a text node */

    if (!attributes) {
      return;
    }

    var hookEvent = {
      attrName: '',
      attrValue: '',
      keepAttr: true,
      allowedAttributes: ALLOWED_ATTR
    };
    l = attributes.length;

    /* Go backwards over all attributes; safely remove bad ones */
    while (l--) {
      attr = attributes[l];
      var _attr = attr,
          name = _attr.name;

      value = attr.value.trim();
      lcName = name.toLowerCase();

      /* Execute a hook if present */
      hookEvent.attrName = lcName;
      hookEvent.attrValue = value;
      hookEvent.keepAttr = true;
      _executeHook('uponSanitizeAttribute', currentNode, hookEvent);
      value = hookEvent.attrValue;

      /* Remove attribute */
      // Safari (iOS + Mac), last tested v8.0.5, crashes if you try to
      // remove a "name" attribute from an <img> tag that has an "id"
      // attribute at the time.
      if (lcName === 'name' && currentNode.nodeName === 'IMG' && attributes.id) {
        idAttr = attributes.id;
        attributes = Array.prototype.slice.apply(attributes);
        _removeAttribute('id', currentNode);
        _removeAttribute(name, currentNode);
        if (attributes.indexOf(idAttr) > l) {
          currentNode.setAttribute('id', idAttr.value);
        }
      } else if (
      // This works around a bug in Safari, where input[type=file]
      // cannot be dynamically set after type has been removed
      currentNode.nodeName === 'INPUT' && lcName === 'type' && value === 'file' && (ALLOWED_ATTR[lcName] || !FORBID_ATTR[lcName])) {
        continue;
      } else {
        // This avoids a crash in Safari v9.0 with double-ids.
        // The trick is to first set the id to be empty and then to
        // remove the attribute
        if (name === 'id') {
          currentNode.setAttribute(name, '');
        }
        _removeAttribute(name, currentNode);
      }

      /* Did the hooks approve of the attribute? */
      if (!hookEvent.keepAttr) {
        continue;
      }

      /* Is `value` valid for this attribute? */
      var lcTag = currentNode.nodeName.toLowerCase();
      if (!_isValidAttribute(lcTag, lcName, value)) {
        continue;
      }

      /* Handle invalid data-* attribute set by try-catching it */
      try {
        currentNode.setAttribute(name, value);
        DOMPurify.removed.pop();
      } catch (err) {}
    }

    /* Execute a hook if present */
    _executeHook('afterSanitizeAttributes', currentNode, null);
  };

  /**
   * _sanitizeShadowDOM
   *
   * @param  {DocumentFragment} fragment to iterate over recursively
   */
  var _sanitizeShadowDOM = function _sanitizeShadowDOM(fragment) {
    var shadowNode = void 0;
    var shadowIterator = _createIterator(fragment);

    /* Execute a hook if present */
    _executeHook('beforeSanitizeShadowDOM', fragment, null);

    while (shadowNode = shadowIterator.nextNode()) {
      /* Execute a hook if present */
      _executeHook('uponSanitizeShadowNode', shadowNode, null);

      /* Sanitize tags and elements */
      if (_sanitizeElements(shadowNode)) {
        continue;
      }

      /* Deep shadow DOM detected */
      if (shadowNode.content instanceof DocumentFragment) {
        _sanitizeShadowDOM(shadowNode.content);
      }

      /* Check attributes, sanitize if necessary */
      _sanitizeAttributes(shadowNode);
    }

    /* Execute a hook if present */
    _executeHook('afterSanitizeShadowDOM', fragment, null);
  };

  /**
   * Sanitize
   * Public method providing core sanitation functionality
   *
   * @param {String|Node} dirty string or DOM node
   * @param {Object} configuration object
   */
  // eslint-disable-next-line complexity
  DOMPurify.sanitize = function (dirty, cfg) {
    var body = void 0;
    var importedNode = void 0;
    var currentNode = void 0;
    var oldNode = void 0;
    var returnNode = void 0;
    /* Make sure we have a string to sanitize.
      DO NOT return early, as this will return the wrong type if
      the user has requested a DOM object rather than a string */
    if (!dirty) {
      dirty = '<!-->';
    }

    /* Stringify, in case dirty is an object */
    if (typeof dirty !== 'string' && !_isNode(dirty)) {
      // eslint-disable-next-line no-negated-condition
      if (typeof dirty.toString !== 'function') {
        throw new TypeError('toString is not a function');
      } else {
        dirty = dirty.toString();
        if (typeof dirty !== 'string') {
          throw new TypeError('dirty is not a string, aborting');
        }
      }
    }

    /* Check we can run. Otherwise fall back or ignore */
    if (!DOMPurify.isSupported) {
      if (_typeof(window.toStaticHTML) === 'object' || typeof window.toStaticHTML === 'function') {
        if (typeof dirty === 'string') {
          return window.toStaticHTML(dirty);
        }
        if (_isNode(dirty)) {
          return window.toStaticHTML(dirty.outerHTML);
        }
      }
      return dirty;
    }

    /* Assign config vars */
    if (!SET_CONFIG) {
      _parseConfig(cfg);
    }

    /* Clean up removed elements */
    DOMPurify.removed = [];

    if (IN_PLACE) {
      /* No special handling necessary for in-place sanitization */
    } else if (dirty instanceof Node) {
      /* If dirty is a DOM element, append to an empty document to avoid
         elements being stripped by the parser */
      body = _initDocument('<!-->');
      importedNode = body.ownerDocument.importNode(dirty, true);
      if (importedNode.nodeType === 1 && importedNode.nodeName === 'BODY') {
        /* Node is already a body, use as is */
        body = importedNode;
      } else {
        body.appendChild(importedNode);
      }
    } else {
      /* Exit directly if we have nothing to do */
      if (!RETURN_DOM && !WHOLE_DOCUMENT && dirty.indexOf('<') === -1) {
        return dirty;
      }

      /* Initialize the document to work on */
      body = _initDocument(dirty);

      /* Check we have a DOM node from the data */
      if (!body) {
        return RETURN_DOM ? null : '';
      }
    }

    /* Remove first element node (ours) if FORCE_BODY is set */
    if (body && FORCE_BODY) {
      _forceRemove(body.firstChild);
    }

    /* Get node iterator */
    var nodeIterator = _createIterator(IN_PLACE ? dirty : body);

    /* Now start iterating over the created document */
    while (currentNode = nodeIterator.nextNode()) {
      /* Fix IE's strange behavior with manipulated textNodes #89 */
      if (currentNode.nodeType === 3 && currentNode === oldNode) {
        continue;
      }

      /* Sanitize tags and elements */
      if (_sanitizeElements(currentNode)) {
        continue;
      }

      /* Shadow DOM detected, sanitize it */
      if (currentNode.content instanceof DocumentFragment) {
        _sanitizeShadowDOM(currentNode.content);
      }

      /* Check attributes, sanitize if necessary */
      _sanitizeAttributes(currentNode);

      oldNode = currentNode;
    }

    /* If we sanitized `dirty` in-place, return it. */
    if (IN_PLACE) {
      return dirty;
    }

    /* Return sanitized string or DOM */
    if (RETURN_DOM) {
      if (RETURN_DOM_FRAGMENT) {
        returnNode = createDocumentFragment.call(body.ownerDocument);

        while (body.firstChild) {
          returnNode.appendChild(body.firstChild);
        }
      } else {
        returnNode = body;
      }

      if (RETURN_DOM_IMPORT) {
        /* AdoptNode() is not used because internal state is not reset
               (e.g. the past names map of a HTMLFormElement), this is safe
               in theory but we would rather not risk another attack vector.
               The state that is cloned by importNode() is explicitly defined
               by the specs. */
        returnNode = importNode.call(originalDocument, returnNode, true);
      }

      return returnNode;
    }

    return WHOLE_DOCUMENT ? body.outerHTML : body.innerHTML;
  };

  /**
   * Public method to set the configuration once
   * setConfig
   *
   * @param {Object} cfg configuration object
   */
  DOMPurify.setConfig = function (cfg) {
    _parseConfig(cfg);
    SET_CONFIG = true;
  };

  /**
   * Public method to remove the configuration
   * clearConfig
   *
   */
  DOMPurify.clearConfig = function () {
    CONFIG = null;
    SET_CONFIG = false;
  };

  /**
   * Public method to check if an attribute value is valid.
   * Uses last set config, if any. Otherwise, uses config defaults.
   * isValidAttribute
   *
   * @param  {string} tag Tag name of containing element.
   * @param  {string} attr Attribute name.
   * @param  {string} value Attribute value.
   * @return {Boolean} Returns true if `value` is valid. Otherwise, returns false.
   */
  DOMPurify.isValidAttribute = function (tag, attr, value) {
    /* Initialize shared config vars if necessary. */
    if (!CONFIG) {
      _parseConfig({});
    }
    var lcTag = tag.toLowerCase();
    var lcName = attr.toLowerCase();
    return _isValidAttribute(lcTag, lcName, value);
  };

  /**
   * AddHook
   * Public method to add DOMPurify hooks
   *
   * @param {String} entryPoint entry point for the hook to add
   * @param {Function} hookFunction function to execute
   */
  DOMPurify.addHook = function (entryPoint, hookFunction) {
    if (typeof hookFunction !== 'function') {
      return;
    }
    hooks[entryPoint] = hooks[entryPoint] || [];
    hooks[entryPoint].push(hookFunction);
  };

  /**
   * RemoveHook
   * Public method to remove a DOMPurify hook at a given entryPoint
   * (pops it from the stack of hooks if more are present)
   *
   * @param {String} entryPoint entry point for the hook to remove
   */
  DOMPurify.removeHook = function (entryPoint) {
    if (hooks[entryPoint]) {
      hooks[entryPoint].pop();
    }
  };

  /**
   * RemoveHooks
   * Public method to remove all DOMPurify hooks at a given entryPoint
   *
   * @param  {String} entryPoint entry point for the hooks to remove
   */
  DOMPurify.removeHooks = function (entryPoint) {
    if (hooks[entryPoint]) {
      hooks[entryPoint] = [];
    }
  };

  /**
   * RemoveAllHooks
   * Public method to remove all DOMPurify hooks
   *
   */
  DOMPurify.removeAllHooks = function () {
    hooks = {};
  };

  return DOMPurify;
}

var purify = createDOMPurify();

return purify;

})));
/**!
 * KvSortable
 * @author	RubaXa   <trash@rubaxa.org>
 * @license MIT
 *
 * Changed kvsortable plugin naming to prevent conflict with JQuery UI Sortable
 * @author Kartik Visweswaran
 */

(function kvsortableModule(factory) {
	"use strict";

	if (typeof define === "function" && define.amd) {
		define(factory);
	}
	else if (typeof module != "undefined" && typeof module.exports != "undefined") {
		module.exports = factory();
	}
	else {
		/* jshint sub:true */
		window["KvSortable"] = factory();
	}
})(function kvsortableFactory() {
	"use strict";

	if (typeof window === "undefined" || !window.document) {
		return function kvsortableError() {
			throw new Error("KvSortable.js requires a window with a document");
		};
	}

	var dragEl,
		parentEl,
		ghostEl,
		cloneEl,
		rootEl,
		nextEl,
		lastDownEl,

		scrollEl,
		scrollParentEl,
		scrollCustomFn,

		lastEl,
		lastCSS,
		lastParentCSS,

		oldIndex,
		newIndex,

		activeGroup,
		putKvSortable,

		autoScroll = {},

		tapEvt,
		touchEvt,

		moved,

		/** @const */
		R_SPACE = /\s+/g,
		R_FLOAT = /left|right|inline/,

		expando = 'KvSortable' + (new Date).getTime(),

		win = window,
		document = win.document,
		parseInt = win.parseInt,
		setTimeout = win.setTimeout,

		$ = win.jQuery || win.Zepto,
		Polymer = win.Polymer,

		captureMode = false,
		passiveMode = false,

		supportDraggable = ('draggable' in document.createElement('div')),
		supportCssPointerEvents = (function (el) {
			// false when IE11
			if (!!navigator.userAgent.match(/(?:Trident.*rv[ :]?11\.|msie)/i)) {
				return false;
			}
			el = document.createElement('x');
			el.style.cssText = 'pointer-events:auto';
			return el.style.pointerEvents === 'auto';
		})(),

		_silent = false,

		abs = Math.abs,
		min = Math.min,

		savedInputChecked = [],
		touchDragOverListeners = [],

		_autoScroll = _throttle(function (/**Event*/evt, /**Object*/options, /**HTMLElement*/rootEl) {
			// Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
			if (rootEl && options.scroll) {
				var _this = rootEl[expando],
					el,
					rect,
					sens = options.scrollSensitivity,
					speed = options.scrollSpeed,

					x = evt.clientX,
					y = evt.clientY,

					winWidth = window.innerWidth,
					winHeight = window.innerHeight,

					vx,
					vy,

					scrollOffsetX,
					scrollOffsetY
				;

				// Delect scrollEl
				if (scrollParentEl !== rootEl) {
					scrollEl = options.scroll;
					scrollParentEl = rootEl;
					scrollCustomFn = options.scrollFn;

					if (scrollEl === true) {
						scrollEl = rootEl;

						do {
							if ((scrollEl.offsetWidth < scrollEl.scrollWidth) ||
								(scrollEl.offsetHeight < scrollEl.scrollHeight)
							) {
								break;
							}
							/* jshint boss:true */
						} while (scrollEl = scrollEl.parentNode);
					}
				}

				if (scrollEl) {
					el = scrollEl;
					rect = scrollEl.getBoundingClientRect();
					vx = (abs(rect.right - x) <= sens) - (abs(rect.left - x) <= sens);
					vy = (abs(rect.bottom - y) <= sens) - (abs(rect.top - y) <= sens);
				}


				if (!(vx || vy)) {
					vx = (winWidth - x <= sens) - (x <= sens);
					vy = (winHeight - y <= sens) - (y <= sens);

					/* jshint expr:true */
					(vx || vy) && (el = win);
				}


				if (autoScroll.vx !== vx || autoScroll.vy !== vy || autoScroll.el !== el) {
					autoScroll.el = el;
					autoScroll.vx = vx;
					autoScroll.vy = vy;

					clearInterval(autoScroll.pid);

					if (el) {
						autoScroll.pid = setInterval(function () {
							scrollOffsetY = vy ? vy * speed : 0;
							scrollOffsetX = vx ? vx * speed : 0;

							if ('function' === typeof(scrollCustomFn)) {
								return scrollCustomFn.call(_this, scrollOffsetX, scrollOffsetY, evt);
							}

							if (el === win) {
								win.scrollTo(win.pageXOffset + scrollOffsetX, win.pageYOffset + scrollOffsetY);
							} else {
								el.scrollTop += scrollOffsetY;
								el.scrollLeft += scrollOffsetX;
							}
						}, 24);
					}
				}
			}
		}, 30),

		_prepareGroup = function (options) {
			function toFn(value, pull) {
				if (value === void 0 || value === true) {
					value = group.name;
				}

				if (typeof value === 'function') {
					return value;
				} else {
					return function (to, from) {
						var fromGroup = from.options.group.name;

						return pull
							? value
							: value && (value.join
								? value.indexOf(fromGroup) > -1
								: (fromGroup == value)
							);
					};
				}
			}

			var group = {};
			var originalGroup = options.group;

			if (!originalGroup || typeof originalGroup != 'object') {
				originalGroup = {name: originalGroup};
			}

			group.name = originalGroup.name;
			group.checkPull = toFn(originalGroup.pull, true);
			group.checkPut = toFn(originalGroup.put);
			group.revertClone = originalGroup.revertClone;

			options.group = group;
		}
	;

	// Detect support a passive mode
	try {
		window.addEventListener('test', null, Object.defineProperty({}, 'passive', {
			get: function () {
				// `false`, because everything starts to work incorrectly and instead of d'n'd,
				// begins the page has scrolled.
				passiveMode = false;
				captureMode = {
					capture: false,
					passive: passiveMode
				};
			}
		}));
	} catch (err) {}

	/**
	 * @class  KvSortable
	 * @param  {HTMLElement}  el
	 * @param  {Object}       [options]
	 */
	function KvSortable(el, options) {
		if (!(el && el.nodeType && el.nodeType === 1)) {
			throw 'KvSortable: `el` must be HTMLElement, and not ' + {}.toString.call(el);
		}

		this.el = el; // root element
		this.options = options = _extend({}, options);


		// Export instance
		el[expando] = this;

		// Default options
		var defaults = {
			group: Math.random(),
			sort: true,
			disabled: false,
			store: null,
			handle: null,
			scroll: true,
			scrollSensitivity: 30,
			scrollSpeed: 10,
			draggable: /[uo]l/i.test(el.nodeName) ? 'li' : '>*',
			ghostClass: 'kvsortable-ghost',
			chosenClass: 'kvsortable-chosen',
			dragClass: 'kvsortable-drag',
			ignore: 'a, img',
			filter: null,
			preventOnFilter: true,
			animation: 0,
			setData: function (dataTransfer, dragEl) {
				dataTransfer.setData('Text', dragEl.textContent);
			},
			dropBubble: false,
			dragoverBubble: false,
			dataIdAttr: 'data-id',
			delay: 0,
			forceFallback: false,
			fallbackClass: 'kvsortable-fallback',
			fallbackOnBody: false,
			fallbackTolerance: 0,
			fallbackOffset: {x: 0, y: 0},
			supportPointer: KvSortable.supportPointer !== false
		};


		// Set default options
		for (var name in defaults) {
			!(name in options) && (options[name] = defaults[name]);
		}

		_prepareGroup(options);

		// Bind all private methods
		for (var fn in this) {
			if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
				this[fn] = this[fn].bind(this);
			}
		}

		// Setup drag mode
		this.nativeDraggable = options.forceFallback ? false : supportDraggable;

		// Bind events
		_on(el, 'mousedown', this._onTapStart);
		_on(el, 'touchstart', this._onTapStart);
		options.supportPointer && _on(el, 'pointerdown', this._onTapStart);

		if (this.nativeDraggable) {
			_on(el, 'dragover', this);
			_on(el, 'dragenter', this);
		}

		touchDragOverListeners.push(this._onDragOver);

		// Restore sorting
		options.store && this.sort(options.store.get(this));
	}


	KvSortable.prototype = /** @lends KvSortable.prototype */ {
		constructor: KvSortable,

		_onTapStart: function (/** Event|TouchEvent */evt) {
			var _this = this,
				el = this.el,
				options = this.options,
				preventOnFilter = options.preventOnFilter,
				type = evt.type,
				touch = evt.touches && evt.touches[0],
				target = (touch || evt).target,
				originalTarget = evt.target.shadowRoot && (evt.path && evt.path[0]) || target,
				filter = options.filter,
				startIndex;

			_saveInputCheckedState(el);


			// Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.
			if (dragEl) {
				return;
			}

			if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
				return; // only left button or enabled
			}

			// cancel dnd if original target is content editable
			if (originalTarget.isContentEditable) {
				return;
			}

			target = _closest(target, options.draggable, el);

			if (!target) {
				return;
			}

			if (lastDownEl === target) {
				// Ignoring duplicate `down`
				return;
			}

			// Get the index of the dragged element within its parent
			startIndex = _index(target, options.draggable);

			// Check filter
			if (typeof filter === 'function') {
				if (filter.call(this, evt, target, this)) {
					_dispatchEvent(_this, originalTarget, 'filter', target, el, el, startIndex);
					preventOnFilter && evt.preventDefault();
					return; // cancel dnd
				}
			}
			else if (filter) {
				filter = filter.split(',').some(function (criteria) {
					criteria = _closest(originalTarget, criteria.trim(), el);

					if (criteria) {
						_dispatchEvent(_this, criteria, 'filter', target, el, el, startIndex);
						return true;
					}
				});

				if (filter) {
					preventOnFilter && evt.preventDefault();
					return; // cancel dnd
				}
			}

			if (options.handle && !_closest(originalTarget, options.handle, el)) {
				return;
			}

			// Prepare `dragstart`
			this._prepareDragStart(evt, touch, target, startIndex);
		},

		_prepareDragStart: function (/** Event */evt, /** Touch */touch, /** HTMLElement */target, /** Number */startIndex) {
			var _this = this,
				el = _this.el,
				options = _this.options,
				ownerDocument = el.ownerDocument,
				dragStartFn;

			if (target && !dragEl && (target.parentNode === el)) {
				tapEvt = evt;

				rootEl = el;
				dragEl = target;
				parentEl = dragEl.parentNode;
				nextEl = dragEl.nextSibling;
				lastDownEl = target;
				activeGroup = options.group;
				oldIndex = startIndex;

				this._lastX = (touch || evt).clientX;
				this._lastY = (touch || evt).clientY;

				dragEl.style['will-change'] = 'all';

				dragStartFn = function () {
					// Delayed drag has been triggered
					// we can re-enable the events: touchmove/mousemove
					_this._disableDelayedDrag();

					// Make the element draggable
					dragEl.draggable = _this.nativeDraggable;

					// Chosen item
					_toggleClass(dragEl, options.chosenClass, true);

					// Bind the events: dragstart/dragend
					_this._triggerDragStart(evt, touch);

					// Drag start event
					_dispatchEvent(_this, rootEl, 'choose', dragEl, rootEl, rootEl, oldIndex);
				};

				// Disable "draggable"
				options.ignore.split(',').forEach(function (criteria) {
					_find(dragEl, criteria.trim(), _disableDraggable);
				});

				_on(ownerDocument, 'mouseup', _this._onDrop);
				_on(ownerDocument, 'touchend', _this._onDrop);
				_on(ownerDocument, 'touchcancel', _this._onDrop);
				_on(ownerDocument, 'selectstart', _this);
				options.supportPointer && _on(ownerDocument, 'pointercancel', _this._onDrop);

				if (options.delay) {
					// If the user moves the pointer or let go the click or touch
					// before the delay has been reached:
					// disable the delayed drag
					_on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchend', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
					_on(ownerDocument, 'mousemove', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchmove', _this._disableDelayedDrag);
					options.supportPointer && _on(ownerDocument, 'pointermove', _this._disableDelayedDrag);

					_this._dragStartTimer = setTimeout(dragStartFn, options.delay);
				} else {
					dragStartFn();
				}


			}
		},

		_disableDelayedDrag: function () {
			var ownerDocument = this.el.ownerDocument;

			clearTimeout(this._dragStartTimer);
			_off(ownerDocument, 'mouseup', this._disableDelayedDrag);
			_off(ownerDocument, 'touchend', this._disableDelayedDrag);
			_off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
			_off(ownerDocument, 'mousemove', this._disableDelayedDrag);
			_off(ownerDocument, 'touchmove', this._disableDelayedDrag);
			_off(ownerDocument, 'pointermove', this._disableDelayedDrag);
		},

		_triggerDragStart: function (/** Event */evt, /** Touch */touch) {
			touch = touch || (evt.pointerType == 'touch' ? evt : null);

			if (touch) {
				// Touch device support
				tapEvt = {
					target: dragEl,
					clientX: touch.clientX,
					clientY: touch.clientY
				};

				this._onDragStart(tapEvt, 'touch');
			}
			else if (!this.nativeDraggable) {
				this._onDragStart(tapEvt, true);
			}
			else {
				_on(dragEl, 'dragend', this);
				_on(rootEl, 'dragstart', this._onDragStart);
			}

			try {
				if (document.selection) {
					// Timeout neccessary for IE9
					_nextTick(function () {
						document.selection.empty();
					});
				} else {
					window.getSelection().removeAllRanges();
				}
			} catch (err) {
			}
		},

		_dragStarted: function () {
			if (rootEl && dragEl) {
				var options = this.options;

				// Apply effect
				_toggleClass(dragEl, options.ghostClass, true);
				_toggleClass(dragEl, options.dragClass, false);

				KvSortable.active = this;

				// Drag start event
				_dispatchEvent(this, rootEl, 'start', dragEl, rootEl, rootEl, oldIndex);
			} else {
				this._nulling();
			}
		},

		_emulateDragOver: function () {
			if (touchEvt) {
				if (this._lastX === touchEvt.clientX && this._lastY === touchEvt.clientY) {
					return;
				}

				this._lastX = touchEvt.clientX;
				this._lastY = touchEvt.clientY;

				if (!supportCssPointerEvents) {
					_css(ghostEl, 'display', 'none');
				}

				var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
				var parent = target;
				var i = touchDragOverListeners.length;

				if (target && target.shadowRoot) {
					target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
					parent = target;
				}

				if (parent) {
					do {
						if (parent[expando]) {
							while (i--) {
								touchDragOverListeners[i]({
									clientX: touchEvt.clientX,
									clientY: touchEvt.clientY,
									target: target,
									rootEl: parent
								});
							}

							break;
						}

						target = parent; // store last element
					}
					/* jshint boss:true */
					while (parent = parent.parentNode);
				}

				if (!supportCssPointerEvents) {
					_css(ghostEl, 'display', '');
				}
			}
		},


		_onTouchMove: function (/**TouchEvent*/evt) {
			if (tapEvt) {
				var	options = this.options,
					fallbackTolerance = options.fallbackTolerance,
					fallbackOffset = options.fallbackOffset,
					touch = evt.touches ? evt.touches[0] : evt,
					dx = (touch.clientX - tapEvt.clientX) + fallbackOffset.x,
					dy = (touch.clientY - tapEvt.clientY) + fallbackOffset.y,
					translate3d = evt.touches ? 'translate3d(' + dx + 'px,' + dy + 'px,0)' : 'translate(' + dx + 'px,' + dy + 'px)';

				// only set the status to dragging, when we are actually dragging
				if (!KvSortable.active) {
					if (fallbackTolerance &&
						min(abs(touch.clientX - this._lastX), abs(touch.clientY - this._lastY)) < fallbackTolerance
					) {
						return;
					}

					this._dragStarted();
				}

				// as well as creating the ghost element on the document body
				this._appendGhost();

				moved = true;
				touchEvt = touch;

				_css(ghostEl, 'webkitTransform', translate3d);
				_css(ghostEl, 'mozTransform', translate3d);
				_css(ghostEl, 'msTransform', translate3d);
				_css(ghostEl, 'transform', translate3d);

				evt.preventDefault();
			}
		},

		_appendGhost: function () {
			if (!ghostEl) {
				var rect = dragEl.getBoundingClientRect(),
					css = _css(dragEl),
					options = this.options,
					ghostRect;

				ghostEl = dragEl.cloneNode(true);

				_toggleClass(ghostEl, options.ghostClass, false);
				_toggleClass(ghostEl, options.fallbackClass, true);
				_toggleClass(ghostEl, options.dragClass, true);

				_css(ghostEl, 'top', rect.top - parseInt(css.marginTop, 10));
				_css(ghostEl, 'left', rect.left - parseInt(css.marginLeft, 10));
				_css(ghostEl, 'width', rect.width);
				_css(ghostEl, 'height', rect.height);
				_css(ghostEl, 'opacity', '0.8');
				_css(ghostEl, 'position', 'fixed');
				_css(ghostEl, 'zIndex', '100000');
				_css(ghostEl, 'pointerEvents', 'none');

				options.fallbackOnBody && document.body.appendChild(ghostEl) || rootEl.appendChild(ghostEl);

				// Fixing dimensions.
				ghostRect = ghostEl.getBoundingClientRect();
				_css(ghostEl, 'width', rect.width * 2 - ghostRect.width);
				_css(ghostEl, 'height', rect.height * 2 - ghostRect.height);
			}
		},

		_onDragStart: function (/**Event*/evt, /**boolean*/useFallback) {
			var _this = this;
			var dataTransfer = evt.dataTransfer;
			var options = _this.options;

			_this._offUpEvents();

			if (activeGroup.checkPull(_this, _this, dragEl, evt)) {
				cloneEl = _clone(dragEl);

				cloneEl.draggable = false;
				cloneEl.style['will-change'] = '';

				_css(cloneEl, 'display', 'none');
				_toggleClass(cloneEl, _this.options.chosenClass, false);

				// #1143: IFrame support workaround
				_this._cloneId = _nextTick(function () {
					rootEl.insertBefore(cloneEl, dragEl);
					_dispatchEvent(_this, rootEl, 'clone', dragEl);
				});
			}

			_toggleClass(dragEl, options.dragClass, true);

			if (useFallback) {
				if (useFallback === 'touch') {
					// Bind touch events
					_on(document, 'touchmove', _this._onTouchMove);
					_on(document, 'touchend', _this._onDrop);
					_on(document, 'touchcancel', _this._onDrop);

					if (options.supportPointer) {
						_on(document, 'pointermove', _this._onTouchMove);
						_on(document, 'pointerup', _this._onDrop);
					}
				} else {
					// Old brwoser
					_on(document, 'mousemove', _this._onTouchMove);
					_on(document, 'mouseup', _this._onDrop);
				}

				_this._loopId = setInterval(_this._emulateDragOver, 50);
			}
			else {
				if (dataTransfer) {
					dataTransfer.effectAllowed = 'move';
					options.setData && options.setData.call(_this, dataTransfer, dragEl);
				}

				_on(document, 'drop', _this);

				// #1143: Бывает элемент с IFrame внутри блокирует `drop`,
				// поэтому если вызвался `mouseover`, значит надо отменять весь d'n'd.
				// Breaking Chrome 62+
				// _on(document, 'mouseover', _this);

				_this._dragStartId = _nextTick(_this._dragStarted);
			}
		},

		_onDragOver: function (/**Event*/evt) {
			var el = this.el,
				target,
				dragRect,
				targetRect,
				revert,
				options = this.options,
				group = options.group,
				activeKvSortable = KvSortable.active,
				isOwner = (activeGroup === group),
				isMovingBetweenKvSortable = false,
				canSort = options.sort;

			if (evt.preventDefault !== void 0) {
				evt.preventDefault();
				!options.dragoverBubble && evt.stopPropagation();
			}

			if (dragEl.animated) {
				return;
			}

			moved = true;

			if (activeKvSortable && !options.disabled &&
				(isOwner
					? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
					: (
						putKvSortable === this ||
						(
							(activeKvSortable.lastPullMode = activeGroup.checkPull(this, activeKvSortable, dragEl, evt)) &&
							group.checkPut(this, activeKvSortable, dragEl, evt)
						)
					)
				) &&
				(evt.rootEl === void 0 || evt.rootEl === this.el) // touch fallback
			) {
				// Smart auto-scrolling
				_autoScroll(evt, options, this.el);

				if (_silent) {
					return;
				}

				target = _closest(evt.target, options.draggable, el);
				dragRect = dragEl.getBoundingClientRect();

				if (putKvSortable !== this) {
					putKvSortable = this;
					isMovingBetweenKvSortable = true;
				}

				if (revert) {
					_cloneHide(activeKvSortable, true);
					parentEl = rootEl; // actualization

					if (cloneEl || nextEl) {
						rootEl.insertBefore(dragEl, cloneEl || nextEl);
					}
					else if (!canSort) {
						rootEl.appendChild(dragEl);
					}

					return;
				}


				if ((el.children.length === 0) || (el.children[0] === ghostEl) ||
					(el === evt.target) && (_ghostIsLast(el, evt))
				) {
					//assign target only if condition is true
					if (el.children.length !== 0 && el.children[0] !== ghostEl && el === evt.target) {
						target = el.lastElementChild;
					}

					if (target) {
						if (target.animated) {
							return;
						}

						targetRect = target.getBoundingClientRect();
					}

					_cloneHide(activeKvSortable, isOwner);

					if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt) !== false) {
						if (!dragEl.contains(el)) {
							el.appendChild(dragEl);
							parentEl = el; // actualization
						}

						this._animate(dragRect, dragEl);
						target && this._animate(targetRect, target);
					}
				}
				else if (target && !target.animated && target !== dragEl && (target.parentNode[expando] !== void 0)) {
					if (lastEl !== target) {
						lastEl = target;
						lastCSS = _css(target);
						lastParentCSS = _css(target.parentNode);
					}

					targetRect = target.getBoundingClientRect();

					var width = targetRect.right - targetRect.left,
						height = targetRect.bottom - targetRect.top,
						floating = R_FLOAT.test(lastCSS.cssFloat + lastCSS.display)
							|| (lastParentCSS.display == 'flex' && lastParentCSS['flex-direction'].indexOf('row') === 0),
						isWide = (target.offsetWidth > dragEl.offsetWidth),
						isLong = (target.offsetHeight > dragEl.offsetHeight),
						halfway = (floating ? (evt.clientX - targetRect.left) / width : (evt.clientY - targetRect.top) / height) > 0.5,
						nextSibling = target.nextElementSibling,
						after = false
					;

					if (floating) {
						var elTop = dragEl.offsetTop,
							tgTop = target.offsetTop;

						if (elTop === tgTop) {
							after = (target.previousElementSibling === dragEl) && !isWide || halfway && isWide;
						}
						else if (target.previousElementSibling === dragEl || dragEl.previousElementSibling === target) {
							after = (evt.clientY - targetRect.top) / height > 0.5;
						} else {
							after = tgTop > elTop;
						}
						} else if (!isMovingBetweenKvSortable) {
						after = (nextSibling !== dragEl) && !isLong || halfway && isLong;
					}

					var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

					if (moveVector !== false) {
						if (moveVector === 1 || moveVector === -1) {
							after = (moveVector === 1);
						}

						_silent = true;
						setTimeout(_unsilent, 30);

						_cloneHide(activeKvSortable, isOwner);

						if (!dragEl.contains(el)) {
							if (after && !nextSibling) {
								el.appendChild(dragEl);
							} else {
								target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
							}
						}

						parentEl = dragEl.parentNode; // actualization

						this._animate(dragRect, dragEl);
						this._animate(targetRect, target);
					}
				}
			}
		},

		_animate: function (prevRect, target) {
			var ms = this.options.animation;

			if (ms) {
				var currentRect = target.getBoundingClientRect();

				if (prevRect.nodeType === 1) {
					prevRect = prevRect.getBoundingClientRect();
				}

				_css(target, 'transition', 'none');
				_css(target, 'transform', 'translate3d('
					+ (prevRect.left - currentRect.left) + 'px,'
					+ (prevRect.top - currentRect.top) + 'px,0)'
				);

				target.offsetWidth; // repaint

				_css(target, 'transition', 'all ' + ms + 'ms');
				_css(target, 'transform', 'translate3d(0,0,0)');

				clearTimeout(target.animated);
				target.animated = setTimeout(function () {
					_css(target, 'transition', '');
					_css(target, 'transform', '');
					target.animated = false;
				}, ms);
			}
		},

		_offUpEvents: function () {
			var ownerDocument = this.el.ownerDocument;

			_off(document, 'touchmove', this._onTouchMove);
			_off(document, 'pointermove', this._onTouchMove);
			_off(ownerDocument, 'mouseup', this._onDrop);
			_off(ownerDocument, 'touchend', this._onDrop);
			_off(ownerDocument, 'pointerup', this._onDrop);
			_off(ownerDocument, 'touchcancel', this._onDrop);
			_off(ownerDocument, 'pointercancel', this._onDrop);
			_off(ownerDocument, 'selectstart', this);
		},

		_onDrop: function (/**Event*/evt) {
			var el = this.el,
				options = this.options;

			clearInterval(this._loopId);
			clearInterval(autoScroll.pid);
			clearTimeout(this._dragStartTimer);

			_cancelNextTick(this._cloneId);
			_cancelNextTick(this._dragStartId);

			// Unbind events
			_off(document, 'mouseover', this);
			_off(document, 'mousemove', this._onTouchMove);

			if (this.nativeDraggable) {
				_off(document, 'drop', this);
				_off(el, 'dragstart', this._onDragStart);
			}

			this._offUpEvents();

			if (evt) {
				if (moved) {
					evt.preventDefault();
					!options.dropBubble && evt.stopPropagation();
				}

				ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

				if (rootEl === parentEl || KvSortable.active.lastPullMode !== 'clone') {
					// Remove clone
					cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
				}

				if (dragEl) {
					if (this.nativeDraggable) {
						_off(dragEl, 'dragend', this);
					}

					_disableDraggable(dragEl);
					dragEl.style['will-change'] = '';

					// Remove class's
					_toggleClass(dragEl, this.options.ghostClass, false);
					_toggleClass(dragEl, this.options.chosenClass, false);

					// Drag stop event
					_dispatchEvent(this, rootEl, 'unchoose', dragEl, parentEl, rootEl, oldIndex);

					if (rootEl !== parentEl) {
						newIndex = _index(dragEl, options.draggable);

						if (newIndex >= 0) {
							// Add event
							_dispatchEvent(null, parentEl, 'add', dragEl, parentEl, rootEl, oldIndex, newIndex);

							// Remove event
							_dispatchEvent(this, rootEl, 'remove', dragEl, parentEl, rootEl, oldIndex, newIndex);

							// drag from one list and drop into another
							_dispatchEvent(null, parentEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex);
							_dispatchEvent(this, rootEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex);
						}
					}
					else {
						if (dragEl.nextSibling !== nextEl) {
							// Get the index of the dragged element within its parent
							newIndex = _index(dragEl, options.draggable);

							if (newIndex >= 0) {
								// drag & drop within the same list
								_dispatchEvent(this, rootEl, 'update', dragEl, parentEl, rootEl, oldIndex, newIndex);
								_dispatchEvent(this, rootEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex);
							}
						}
					}

					if (KvSortable.active) {
						/* jshint eqnull:true */
						if (newIndex == null || newIndex === -1) {
							newIndex = oldIndex;
						}

						_dispatchEvent(this, rootEl, 'end', dragEl, parentEl, rootEl, oldIndex, newIndex);

						// Save sorting
						this.save();
					}
				}

			}

			this._nulling();
		},

		_nulling: function() {
			rootEl =
			dragEl =
			parentEl =
			ghostEl =
			nextEl =
			cloneEl =
			lastDownEl =

			scrollEl =
			scrollParentEl =

			tapEvt =
			touchEvt =

			moved =
			newIndex =

			lastEl =
			lastCSS =

			putKvSortable =
			activeGroup =
			KvSortable.active = null;

			savedInputChecked.forEach(function (el) {
				el.checked = true;
			});
			savedInputChecked.length = 0;
		},

		handleEvent: function (/**Event*/evt) {
			switch (evt.type) {
				case 'drop':
				case 'dragend':
					this._onDrop(evt);
					break;

				case 'dragover':
				case 'dragenter':
					if (dragEl) {
						this._onDragOver(evt);
						_globalDragOver(evt);
					}
					break;

				case 'mouseover':
					this._onDrop(evt);
					break;

				case 'selectstart':
					evt.preventDefault();
					break;
			}
		},


		/**
		 * Serializes the item into an array of string.
		 * @returns {String[]}
		 */
		toArray: function () {
			var order = [],
				el,
				children = this.el.children,
				i = 0,
				n = children.length,
				options = this.options;

			for (; i < n; i++) {
				el = children[i];
				if (_closest(el, options.draggable, this.el)) {
					order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
				}
			}

			return order;
		},


		/**
		 * Sorts the elements according to the array.
		 * @param  {String[]}  order  order of the items
		 */
		sort: function (order) {
			var items = {}, rootEl = this.el;

			this.toArray().forEach(function (id, i) {
				var el = rootEl.children[i];

				if (_closest(el, this.options.draggable, rootEl)) {
					items[id] = el;
				}
			}, this);

			order.forEach(function (id) {
				if (items[id]) {
					rootEl.removeChild(items[id]);
					rootEl.appendChild(items[id]);
				}
			});
		},


		/**
		 * Save the current sorting
		 */
		save: function () {
			var store = this.options.store;
			store && store.set(this);
		},


		/**
		 * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
		 * @param   {HTMLElement}  el
		 * @param   {String}       [selector]  default: `options.draggable`
		 * @returns {HTMLElement|null}
		 */
		closest: function (el, selector) {
			return _closest(el, selector || this.options.draggable, this.el);
		},


		/**
		 * Set/get option
		 * @param   {string} name
		 * @param   {*}      [value]
		 * @returns {*}
		 */
		option: function (name, value) {
			var options = this.options;

			if (value === void 0) {
				return options[name];
			} else {
				options[name] = value;

				if (name === 'group') {
					_prepareGroup(options);
				}
			}
		},


		/**
		 * Destroy
		 */
		destroy: function () {
			var el = this.el;

			el[expando] = null;

			_off(el, 'mousedown', this._onTapStart);
			_off(el, 'touchstart', this._onTapStart);
			_off(el, 'pointerdown', this._onTapStart);

			if (this.nativeDraggable) {
				_off(el, 'dragover', this);
				_off(el, 'dragenter', this);
			}

			// Remove draggable attributes
			Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
				el.removeAttribute('draggable');
			});

			touchDragOverListeners.splice(touchDragOverListeners.indexOf(this._onDragOver), 1);

			this._onDrop();

			this.el = el = null;
		}
	};


	function _cloneHide(kvsortable, state) {
		if (kvsortable.lastPullMode !== 'clone') {
			state = true;
		}

		if (cloneEl && (cloneEl.state !== state)) {
			_css(cloneEl, 'display', state ? 'none' : '');

			if (!state) {
				if (cloneEl.state) {
					if (kvsortable.options.group.revertClone) {
						rootEl.insertBefore(cloneEl, nextEl);
						kvsortable._animate(dragEl, cloneEl);
					} else {
						rootEl.insertBefore(cloneEl, dragEl);
					}
				}
			}

			cloneEl.state = state;
		}
	}


	function _closest(/**HTMLElement*/el, /**String*/selector, /**HTMLElement*/ctx) {
		if (el) {
			ctx = ctx || document;

			do {
				if ((selector === '>*' && el.parentNode === ctx) || _matches(el, selector)) {
					return el;
				}
				/* jshint boss:true */
			} while (el = _getParentOrHost(el));
		}

		return null;
	}


	function _getParentOrHost(el) {
		var parent = el.host;

		return (parent && parent.nodeType) ? parent : el.parentNode;
	}


	function _globalDragOver(/**Event*/evt) {
		if (evt.dataTransfer) {
			evt.dataTransfer.dropEffect = 'move';
		}
		evt.preventDefault();
	}


	function _on(el, event, fn) {
		el.addEventListener(event, fn, captureMode);
	}


	function _off(el, event, fn) {
		el.removeEventListener(event, fn, captureMode);
	}


	function _toggleClass(el, name, state) {
		if (el) {
			if (el.classList) {
				el.classList[state ? 'add' : 'remove'](name);
			}
			else {
				var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
				el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
			}
		}
	}


	function _css(el, prop, val) {
		var style = el && el.style;

		if (style) {
			if (val === void 0) {
				if (document.defaultView && document.defaultView.getComputedStyle) {
					val = document.defaultView.getComputedStyle(el, '');
				}
				else if (el.currentStyle) {
					val = el.currentStyle;
				}

				return prop === void 0 ? val : val[prop];
			}
			else {
				if (!(prop in style)) {
					prop = '-webkit-' + prop;
				}

				style[prop] = val + (typeof val === 'string' ? '' : 'px');
			}
		}
	}


	function _find(ctx, tagName, iterator) {
		if (ctx) {
			var list = ctx.getElementsByTagName(tagName), i = 0, n = list.length;

			if (iterator) {
				for (; i < n; i++) {
					iterator(list[i], i);
				}
			}

			return list;
		}

		return [];
	}



	function _dispatchEvent(kvsortable, rootEl, name, targetEl, toEl, fromEl, startIndex, newIndex) {
		kvsortable = (kvsortable || rootEl[expando]);

		var evt = document.createEvent('Event'),
			options = kvsortable.options,
			onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1);

		evt.initEvent(name, true, true);

		evt.to = toEl || rootEl;
		evt.from = fromEl || rootEl;
		evt.item = targetEl || rootEl;
		evt.clone = cloneEl;

		evt.oldIndex = startIndex;
		evt.newIndex = newIndex;

		rootEl.dispatchEvent(evt);

		if (options[onName]) {
			options[onName].call(kvsortable, evt);
		}
	}


	function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvt, willInsertAfter) {
		var evt,
			kvsortable = fromEl[expando],
			onMoveFn = kvsortable.options.onMove,
			retVal;

		evt = document.createEvent('Event');
		evt.initEvent('move', true, true);

		evt.to = toEl;
		evt.from = fromEl;
		evt.dragged = dragEl;
		evt.draggedRect = dragRect;
		evt.related = targetEl || toEl;
		evt.relatedRect = targetRect || toEl.getBoundingClientRect();
		evt.willInsertAfter = willInsertAfter;

		fromEl.dispatchEvent(evt);

		if (onMoveFn) {
			retVal = onMoveFn.call(kvsortable, evt, originalEvt);
		}

		return retVal;
	}


	function _disableDraggable(el) {
		el.draggable = false;
	}


	function _unsilent() {
		_silent = false;
	}


	/** @returns {HTMLElement|false} */
	function _ghostIsLast(el, evt) {
		var lastEl = el.lastElementChild,
			rect = lastEl.getBoundingClientRect();

		// 5 — min delta
		// abs — нельзя добавлять, а то глюки при наведении сверху
		return (evt.clientY - (rect.top + rect.height) > 5) ||
			(evt.clientX - (rect.left + rect.width) > 5);
	}


	/**
	 * Generate id
	 * @param   {HTMLElement} el
	 * @returns {String}
	 * @private
	 */
	function _generateId(el) {
		var str = el.tagName + el.className + el.src + el.href + el.textContent,
			i = str.length,
			sum = 0;

		while (i--) {
			sum += str.charCodeAt(i);
		}

		return sum.toString(36);
	}

	/**
	 * Returns the index of an element within its parent for a selected set of
	 * elements
	 * @param  {HTMLElement} el
	 * @param  {selector} selector
	 * @return {number}
	 */
	function _index(el, selector) {
		var index = 0;

		if (!el || !el.parentNode) {
			return -1;
		}

		while (el && (el = el.previousElementSibling)) {
			if ((el.nodeName.toUpperCase() !== 'TEMPLATE') && (selector === '>*' || _matches(el, selector))) {
				index++;
			}
		}

		return index;
	}

	function _matches(/**HTMLElement*/el, /**String*/selector) {
		if (el) {
			selector = selector.split('.');

			var tag = selector.shift().toUpperCase(),
				re = new RegExp('\\s(' + selector.join('|') + ')(?=\\s)', 'g');

			return (
				(tag === '' || el.nodeName.toUpperCase() == tag) &&
				(!selector.length || ((' ' + el.className + ' ').match(re) || []).length == selector.length)
			);
		}

		return false;
	}

	function _throttle(callback, ms) {
		var args, _this;

		return function () {
			if (args === void 0) {
				args = arguments;
				_this = this;

				setTimeout(function () {
					if (args.length === 1) {
						callback.call(_this, args[0]);
					} else {
						callback.apply(_this, args);
					}

					args = void 0;
				}, ms);
			}
		};
	}

	function _extend(dst, src) {
		if (dst && src) {
			for (var key in src) {
				if (src.hasOwnProperty(key)) {
					dst[key] = src[key];
				}
			}
		}

		return dst;
	}

	function _clone(el) {
		if (Polymer && Polymer.dom) {
			return Polymer.dom(el).cloneNode(true);
		}
		else if ($) {
			return $(el).clone(true)[0];
		}
		else {
			return el.cloneNode(true);
		}
	}

	function _saveInputCheckedState(root) {
		var inputs = root.getElementsByTagName('input');
		var idx = inputs.length;

		while (idx--) {
			var el = inputs[idx];
			el.checked && savedInputChecked.push(el);
		}
	}

	function _nextTick(fn) {
		return setTimeout(fn, 0);
	}

	function _cancelNextTick(id) {
		return clearTimeout(id);
	}

	// Fixed #973:
	_on(document, 'touchmove', function (evt) {
		if (KvSortable.active) {
			evt.preventDefault();
		}
	});

	// Export utils
	KvSortable.utils = {
		on: _on,
		off: _off,
		css: _css,
		find: _find,
		is: function (el, selector) {
			return !!_closest(el, selector, el);
		},
		extend: _extend,
		throttle: _throttle,
		closest: _closest,
		toggleClass: _toggleClass,
		clone: _clone,
		index: _index,
		nextTick: _nextTick,
		cancelNextTick: _cancelNextTick
	};


	/**
	 * Create kvsortable instance
	 * @param {HTMLElement}  el
	 * @param {Object}      [options]
	 */
	KvSortable.create = function (el, options) {
		return new KvSortable(el, options);
	};


	// Export
	KvSortable.version = '1.7.0';
	return KvSortable;
});
/**
 * jQuery plugin for KvSortable
 */
(function (factory) {
    "use strict";

    if (typeof define === "function" && define.amd) {
        define(["jquery"], factory);
    }
    else {
        /* jshint sub:true */
        factory(jQuery);
    }
})(function ($) {
    "use strict";
    $.fn.kvsortable = function (options) {
        var retVal,
            args = arguments;

        this.each(function () {
            var $el = $(this), kvsortable = $el.data('kvsortable');

            if (!kvsortable && (options instanceof Object || !options)) {
                kvsortable = new KvSortable(this, options);
                $el.data('kvsortable', kvsortable);
            }

            if (kvsortable) {
                if (options === 'widget') {
                    retVal = kvsortable;
                }
                else if (options === 'destroy') {
                    kvsortable.destroy();
                    $el.removeData('kvsortable');
                }
                else if (typeof kvsortable[options] === 'function') {
                    retVal = kvsortable[options].apply(kvsortable, [].slice.call(args, 1));
                }
                else if (options in kvsortable.options) {
                    retVal = kvsortable.option.apply(kvsortable, args);
                }
            }
        });

        return (retVal === void 0) ? this : retVal;
    };
});
/*!
 * bootstrap-fileinput v5.0.7
 * http://plugins.krajee.com/file-input
 *
 * Font Awesome 5 icon theme configuration for bootstrap-fileinput. Requires font awesome 5 assets to be loaded.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2019, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD-3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
(function ($) {
    "use strict";

    $.fn.fileinputThemes.fas = {
        fileActionSettings: {
            removeIcon: '<i class="fas fa-trash-alt"></i>',
            uploadIcon: '<i class="fas fa-upload"></i>',
            uploadRetryIcon: '<i class="fas fa-redo-alt"></i>',
            downloadIcon: '<i class="fas fa-download"></i>',
            zoomIcon: '<i class="fas fa-search-plus"></i>',
            dragIcon: '<i class="fas fa-arrows-alt"></i>',
            indicatorNew: '<i class="fas fa-plus-circle text-warning"></i>',
            indicatorSuccess: '<i class="fas fa-check-circle text-success"></i>',
            indicatorError: '<i class="fas fa-exclamation-circle text-danger"></i>',
            indicatorLoading: '<i class="fas fa-hourglass text-muted"></i>',
            indicatorPaused: '<i class="fa fa-pause text-info"></i>'
        },
        layoutTemplates: {
            fileIcon: '<i class="fas fa-file kv-caption-icon"></i> '
        },
        previewZoomButtonIcons: {
            prev: '<i class="fas fa-caret-left fa-lg"></i>',
            next: '<i class="fas fa-caret-right fa-lg"></i>',
            toggleheader: '<i class="fas fa-fw fa-arrows-alt-v"></i>',
            fullscreen: '<i class="fas fa-fw fa-arrows-alt"></i>',
            borderless: '<i class="fas fa-fw fa-external-link-alt"></i>',
            close: '<i class="fas fa-fw fa-times"></i>'
        },
        previewFileIcon: '<i class="fas fa-file"></i>',
        browseIcon: '<i class="fas fa-folder-open"></i>',
        removeIcon: '<i class="fas fa-trash-alt"></i>',
        cancelIcon: '<i class="fas fa-ban"></i>',
        pauseIcon: '<i class="fas fa-pause"></i>',
        uploadIcon: '<i class="fas fa-upload"></i>',
        msgValidationErrorIcon: '<i class="fas fa-exclamation-circle"></i> '
    };
})(window.jQuery);

/*!
 * bootstrap-fileinput v5.0.7
 * http://plugins.krajee.com/file-input
 *
 * Krajee Explorer Font Awesome theme configuration for bootstrap-fileinput. 
 * Load this theme file after loading `fileinput.js`. Ensure that
 * font awesome assets and CSS are loaded on the page as well.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2019, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD-3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
(function ($) {
    'use strict';
    var teTagBef = '<tr class="file-preview-frame {frameClass}" id="{previewId}" data-fileindex="{fileindex}"' +
        ' data-fileid="{fileid}" data-template="{template}"', teContent = '<td class="kv-file-content">\n';
    $.fn.fileinputThemes['explorer-fas'] = {
        layoutTemplates: {
            preview: '<div class="file-preview {class}">\n' +
            '    {close}' +
            '    <div class="{dropClass}">\n' +
            '    <table class="table table-bordered table-hover"><tbody class="file-preview-thumbnails">\n' +
            '    </tbody></table>\n' +
            '    <div class="clearfix"></div>' +
            '    <div class="file-preview-status text-center text-success"></div>\n' +
            '    <div class="kv-fileinput-error"></div>\n' +
            '    </div>\n' +
            '</div>',
            footer: '<td class="file-details-cell"><div class="explorer-caption" title="{caption}">{caption}</div> ' +
            '{size}{progress}</td><td class="file-actions-cell">{indicator} {actions}</td>',
            actions: '{drag}\n' +
            '<div class="file-actions">\n' +
            '    <div class="file-footer-buttons">\n' +
            '        {upload} {download} {delete} {zoom} {other} ' +
            '    </div>\n' +
            '</div>',
            zoomCache: '<tr style="display:none" class="kv-zoom-cache-theme"><td>' +
            '<table class="kv-zoom-cache">{zoomContent}</table></td></tr>',
            fileIcon: '<i class="fas fa-file kv-caption-icon"></i> '
        },
        previewMarkupTags: {
            tagBefore1: teTagBef + '>' + teContent,
            tagBefore2: teTagBef + ' title="{caption}">' + teContent,
            tagAfter: '</td>\n{footer}</tr>\n'
        },
        previewSettings: {
            html: {width: '100px', height: '60px'},
            text: {width: '100px', height: '60px'},
            video: {width: 'auto', height: '60px'},
            audio: {width: 'auto', height: '60px'},
            flash: {width: '100%', height: '60px'},
            object: {width: '100%', height: '60px'},
            pdf: {width: '100px', height: '60px'},
            other: {width: '100%', height: '60px'}
        },
        frameClass: 'explorer-frame',
        fileActionSettings: {
            removeIcon: '<i class="fas fa-trash-alt"></i>',
            uploadIcon: '<i class="fas fa-upload"></i>',
            uploadRetryIcon: '<i class="fas fa-redo-alt"></i>',
            downloadIcon: '<i class="fas fa-download"></i>',
            zoomIcon: '<i class="fas fa-search-plus"></i>',
            dragIcon: '<i class="fas fa-arrows-alt"></i>',
            indicatorNew: '<i class="fas fa-plus-circle text-warning"></i>',
            indicatorSuccess: '<i class="fas fa-check-circle text-success"></i>',
            indicatorError: '<i class="fas fa-exclamation-circle text-danger"></i>',
            indicatorLoading: '<i class="fas fa-hourglass text-muted"></i>',
            indicatorPaused: '<i class="fa fa-pause text-info"></i>'
        },
        previewZoomButtonIcons: {
            prev: '<i class="fas fa-caret-left fa-lg"></i>',
            next: '<i class="fas fa-caret-right fa-lg"></i>',
            toggleheader: '<i class="fas fa-fw fa-arrows-alt-v"></i>',
            fullscreen: '<i class="fas fa-fw fa-arrows-alt"></i>',
            borderless: '<i class="fas fa-fw fa-external-link-alt"></i>',
            close: '<i class="fas fa-fw fa-times"></i>'
        },
        previewFileIcon: '<i class="fas fa-file"></i>',
        browseIcon: '<i class="fas fa-folder-open"></i>',
        removeIcon: '<i class="fas fa-trash-alt"></i>',
        cancelIcon: '<i class="fas fa-ban"></i>',
        pauseIcon: '<i class="fas fa-pause"></i>',
        uploadIcon: '<i class="fas fa-upload"></i>',
        msgValidationErrorIcon: '<i class="fas fa-exclamation-circle"></i> '
    };
})(window.jQuery);
/*!
* sweetalert2 v9.3.16
* Released under the MIT License.
*/
(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
	typeof define === 'function' && define.amd ? define(factory) :
	(global.Sweetalert2 = factory());
}(this, (function () { 'use strict';

function _typeof(obj) {
  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function (obj) {
      return typeof obj;
    };
  } else {
    _typeof = function (obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _construct(Parent, args, Class) {
  if (isNativeReflectConstruct()) {
    _construct = Reflect.construct;
  } else {
    _construct = function _construct(Parent, args, Class) {
      var a = [null];
      a.push.apply(a, args);
      var Constructor = Function.bind.apply(Parent, a);
      var instance = new Constructor();
      if (Class) _setPrototypeOf(instance, Class.prototype);
      return instance;
    };
  }

  return _construct.apply(null, arguments);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _possibleConstructorReturn(self, call) {
  if (call && (typeof call === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _superPropBase(object, property) {
  while (!Object.prototype.hasOwnProperty.call(object, property)) {
    object = _getPrototypeOf(object);
    if (object === null) break;
  }

  return object;
}

function _get(target, property, receiver) {
  if (typeof Reflect !== "undefined" && Reflect.get) {
    _get = Reflect.get;
  } else {
    _get = function _get(target, property, receiver) {
      var base = _superPropBase(target, property);

      if (!base) return;
      var desc = Object.getOwnPropertyDescriptor(base, property);

      if (desc.get) {
        return desc.get.call(receiver);
      }

      return desc.value;
    };
  }

  return _get(target, property, receiver || target);
}

var consolePrefix = 'SweetAlert2:';
/**
 * Filter the unique values into a new array
 * @param arr
 */

var uniqueArray = function uniqueArray(arr) {
  var result = [];

  for (var i = 0; i < arr.length; i++) {
    if (result.indexOf(arr[i]) === -1) {
      result.push(arr[i]);
    }
  }

  return result;
};
/**
 * Capitalize the first letter of a string
 * @param str
 */

var capitalizeFirstLetter = function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
};
/**
 * Returns the array ob object values (Object.values isn't supported in IE11)
 * @param obj
 */

var objectValues = function objectValues(obj) {
  return Object.keys(obj).map(function (key) {
    return obj[key];
  });
};
/**
 * Convert NodeList to Array
 * @param nodeList
 */

var toArray = function toArray(nodeList) {
  return Array.prototype.slice.call(nodeList);
};
/**
 * Standardise console warnings
 * @param message
 */

var warn = function warn(message) {
  console.warn("".concat(consolePrefix, " ").concat(message));
};
/**
 * Standardise console errors
 * @param message
 */

var error = function error(message) {
  console.error("".concat(consolePrefix, " ").concat(message));
};
/**
 * Private global state for `warnOnce`
 * @type {Array}
 * @private
 */

var previousWarnOnceMessages = [];
/**
 * Show a console warning, but only if it hasn't already been shown
 * @param message
 */

var warnOnce = function warnOnce(message) {
  if (!(previousWarnOnceMessages.indexOf(message) !== -1)) {
    previousWarnOnceMessages.push(message);
    warn(message);
  }
};
/**
 * Show a one-time console warning about deprecated params/methods
 */

var warnAboutDepreation = function warnAboutDepreation(deprecatedParam, useInstead) {
  warnOnce("\"".concat(deprecatedParam, "\" is deprecated and will be removed in the next major release. Please use \"").concat(useInstead, "\" instead."));
};
/**
 * If `arg` is a function, call it (with no arguments or context) and return the result.
 * Otherwise, just pass the value through
 * @param arg
 */

var callIfFunction = function callIfFunction(arg) {
  return typeof arg === 'function' ? arg() : arg;
};
var isPromise = function isPromise(arg) {
  return arg && Promise.resolve(arg) === arg;
};

var DismissReason = Object.freeze({
  cancel: 'cancel',
  backdrop: 'backdrop',
  close: 'close',
  esc: 'esc',
  timer: 'timer'
});

var isJqueryElement = function isJqueryElement(elem) {
  return _typeof(elem) === 'object' && elem.jquery;
};

var isElement = function isElement(elem) {
  return elem instanceof Element || isJqueryElement(elem);
};

var argsToParams = function argsToParams(args) {
  var params = {};

  if (_typeof(args[0]) === 'object' && !isElement(args[0])) {
    _extends(params, args[0]);
  } else {
    ['title', 'html', 'icon'].forEach(function (name, index) {
      var arg = args[index];

      if (typeof arg === 'string' || isElement(arg)) {
        params[name] = arg;
      } else if (arg !== undefined) {
        error("Unexpected type of ".concat(name, "! Expected \"string\" or \"Element\", got ").concat(_typeof(arg)));
      }
    });
  }

  return params;
};

var swalPrefix = 'swal2-';
var prefix = function prefix(items) {
  var result = {};

  for (var i in items) {
    result[items[i]] = swalPrefix + items[i];
  }

  return result;
};
var swalClasses = prefix(['container', 'shown', 'height-auto', 'iosfix', 'popup', 'modal', 'no-backdrop', 'toast', 'toast-shown', 'toast-column', 'show', 'hide', 'close', 'title', 'header', 'content', 'actions', 'confirm', 'cancel', 'footer', 'icon', 'icon-content', 'image', 'input', 'file', 'range', 'select', 'radio', 'checkbox', 'label', 'textarea', 'inputerror', 'validation-message', 'progress-steps', 'active-progress-step', 'progress-step', 'progress-step-line', 'loading', 'styled', 'top', 'top-start', 'top-end', 'top-left', 'top-right', 'center', 'center-start', 'center-end', 'center-left', 'center-right', 'bottom', 'bottom-start', 'bottom-end', 'bottom-left', 'bottom-right', 'grow-row', 'grow-column', 'grow-fullscreen', 'rtl', 'timer-progress-bar', 'scrollbar-measure']);
var iconTypes = prefix(['success', 'warning', 'info', 'question', 'error']);

var getContainer = function getContainer() {
  return document.body.querySelector(".".concat(swalClasses.container));
};
var elementBySelector = function elementBySelector(selectorString) {
  var container = getContainer();
  return container ? container.querySelector(selectorString) : null;
};

var elementByClass = function elementByClass(className) {
  return elementBySelector(".".concat(className));
};

var getPopup = function getPopup() {
  return elementByClass(swalClasses.popup);
};
var getIcons = function getIcons() {
  var popup = getPopup();
  return toArray(popup.querySelectorAll(".".concat(swalClasses.icon)));
};
var getIcon = function getIcon() {
  var visibleIcon = getIcons().filter(function (icon) {
    return isVisible(icon);
  });
  return visibleIcon.length ? visibleIcon[0] : null;
};
var getTitle = function getTitle() {
  return elementByClass(swalClasses.title);
};
var getContent = function getContent() {
  return elementByClass(swalClasses.content);
};
var getImage = function getImage() {
  return elementByClass(swalClasses.image);
};
var getProgressSteps = function getProgressSteps() {
  return elementByClass(swalClasses['progress-steps']);
};
var getValidationMessage = function getValidationMessage() {
  return elementByClass(swalClasses['validation-message']);
};
var getConfirmButton = function getConfirmButton() {
  return elementBySelector(".".concat(swalClasses.actions, " .").concat(swalClasses.confirm));
};
var getCancelButton = function getCancelButton() {
  return elementBySelector(".".concat(swalClasses.actions, " .").concat(swalClasses.cancel));
};
var getActions = function getActions() {
  return elementByClass(swalClasses.actions);
};
var getHeader = function getHeader() {
  return elementByClass(swalClasses.header);
};
var getFooter = function getFooter() {
  return elementByClass(swalClasses.footer);
};
var getTimerProgressBar = function getTimerProgressBar() {
  return elementByClass(swalClasses['timer-progress-bar']);
};
var getCloseButton = function getCloseButton() {
  return elementByClass(swalClasses.close);
}; // https://github.com/jkup/focusable/blob/master/index.js

var focusable = "\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex=\"0\"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n";
var getFocusableElements = function getFocusableElements() {
  var focusableElementsWithTabindex = toArray(getPopup().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')) // sort according to tabindex
  .sort(function (a, b) {
    a = parseInt(a.getAttribute('tabindex'));
    b = parseInt(b.getAttribute('tabindex'));

    if (a > b) {
      return 1;
    } else if (a < b) {
      return -1;
    }

    return 0;
  });
  var otherFocusableElements = toArray(getPopup().querySelectorAll(focusable)).filter(function (el) {
    return el.getAttribute('tabindex') !== '-1';
  });
  return uniqueArray(focusableElementsWithTabindex.concat(otherFocusableElements)).filter(function (el) {
    return isVisible(el);
  });
};
var isModal = function isModal() {
  return !isToast() && !document.body.classList.contains(swalClasses['no-backdrop']);
};
var isToast = function isToast() {
  return document.body.classList.contains(swalClasses['toast-shown']);
};
var isLoading = function isLoading() {
  return getPopup().hasAttribute('data-loading');
};

var states = {
  previousBodyPadding: null
};
var hasClass = function hasClass(elem, className) {
  if (!className) {
    return false;
  }

  var classList = className.split(/\s+/);

  for (var i = 0; i < classList.length; i++) {
    if (!elem.classList.contains(classList[i])) {
      return false;
    }
  }

  return true;
};

var removeCustomClasses = function removeCustomClasses(elem, params) {
  toArray(elem.classList).forEach(function (className) {
    if (!(objectValues(swalClasses).indexOf(className) !== -1) && !(objectValues(iconTypes).indexOf(className) !== -1) && !(objectValues(params.showClass).indexOf(className) !== -1)) {
      elem.classList.remove(className);
    }
  });
};

var applyCustomClass = function applyCustomClass(elem, params, className) {
  removeCustomClasses(elem, params);

  if (params.customClass && params.customClass[className]) {
    if (typeof params.customClass[className] !== 'string' && !params.customClass[className].forEach) {
      return warn("Invalid type of customClass.".concat(className, "! Expected string or iterable object, got \"").concat(_typeof(params.customClass[className]), "\""));
    }

    addClass(elem, params.customClass[className]);
  }
};
function getInput(content, inputType) {
  if (!inputType) {
    return null;
  }

  switch (inputType) {
    case 'select':
    case 'textarea':
    case 'file':
      return getChildByClass(content, swalClasses[inputType]);

    case 'checkbox':
      return content.querySelector(".".concat(swalClasses.checkbox, " input"));

    case 'radio':
      return content.querySelector(".".concat(swalClasses.radio, " input:checked")) || content.querySelector(".".concat(swalClasses.radio, " input:first-child"));

    case 'range':
      return content.querySelector(".".concat(swalClasses.range, " input"));

    default:
      return getChildByClass(content, swalClasses.input);
  }
}
var focusInput = function focusInput(input) {
  input.focus(); // place cursor at end of text in text input

  if (input.type !== 'file') {
    // http://stackoverflow.com/a/2345915
    var val = input.value;
    input.value = '';
    input.value = val;
  }
};
var toggleClass = function toggleClass(target, classList, condition) {
  if (!target || !classList) {
    return;
  }

  if (typeof classList === 'string') {
    classList = classList.split(/\s+/).filter(Boolean);
  }

  classList.forEach(function (className) {
    if (target.forEach) {
      target.forEach(function (elem) {
        condition ? elem.classList.add(className) : elem.classList.remove(className);
      });
    } else {
      condition ? target.classList.add(className) : target.classList.remove(className);
    }
  });
};
var addClass = function addClass(target, classList) {
  toggleClass(target, classList, true);
};
var removeClass = function removeClass(target, classList) {
  toggleClass(target, classList, false);
};
var getChildByClass = function getChildByClass(elem, className) {
  for (var i = 0; i < elem.childNodes.length; i++) {
    if (hasClass(elem.childNodes[i], className)) {
      return elem.childNodes[i];
    }
  }
};
var applyNumericalStyle = function applyNumericalStyle(elem, property, value) {
  if (value || parseInt(value) === 0) {
    elem.style[property] = typeof value === 'number' ? "".concat(value, "px") : value;
  } else {
    elem.style.removeProperty(property);
  }
};
var show = function show(elem) {
  var display = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'flex';
  elem.style.opacity = '';
  elem.style.display = display;
};
var hide = function hide(elem) {
  elem.style.opacity = '';
  elem.style.display = 'none';
};
var toggle = function toggle(elem, condition, display) {
  condition ? show(elem, display) : hide(elem);
}; // borrowed from jquery $(elem).is(':visible') implementation

var isVisible = function isVisible(elem) {
  return !!(elem && (elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length));
};
/* istanbul ignore next */

var isScrollable = function isScrollable(elem) {
  return !!(elem.scrollHeight > elem.clientHeight);
}; // borrowed from https://stackoverflow.com/a/46352119

var hasCssAnimation = function hasCssAnimation(elem) {
  var style = window.getComputedStyle(elem);
  var animDuration = parseFloat(style.getPropertyValue('animation-duration') || '0');
  var transDuration = parseFloat(style.getPropertyValue('transition-duration') || '0');
  return animDuration > 0 || transDuration > 0;
};
var contains = function contains(haystack, needle) {
  if (typeof haystack.contains === 'function') {
    return haystack.contains(needle);
  }
};
var animateTimerProgressBar = function animateTimerProgressBar(timer) {
  var reset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  var timerProgressBar = getTimerProgressBar();

  if (isVisible(timerProgressBar)) {
    if (reset) {
      timerProgressBar.style.transition = 'none';
      timerProgressBar.style.width = '100%';
    }

    setTimeout(function () {
      timerProgressBar.style.transition = "width ".concat(timer / 1000, "s linear");
      timerProgressBar.style.width = '0%';
    }, 10);
  }
};
var stopTimerProgressBar = function stopTimerProgressBar() {
  var timerProgressBar = getTimerProgressBar();
  var timerProgressBarWidth = parseInt(window.getComputedStyle(timerProgressBar).width);
  timerProgressBar.style.removeProperty('transition');
  timerProgressBar.style.width = '100%';
  var timerProgressBarFullWidth = parseInt(window.getComputedStyle(timerProgressBar).width);
  var timerProgressBarPercent = parseInt(timerProgressBarWidth / timerProgressBarFullWidth * 100);
  timerProgressBar.style.removeProperty('transition');
  timerProgressBar.style.width = "".concat(timerProgressBarPercent, "%");
};

// Detect Node env
var isNodeEnv = function isNodeEnv() {
  return typeof window === 'undefined' || typeof document === 'undefined';
};

var sweetHTML = "\n <div aria-labelledby=\"".concat(swalClasses.title, "\" aria-describedby=\"").concat(swalClasses.content, "\" class=\"").concat(swalClasses.popup, "\" tabindex=\"-1\">\n   <div class=\"").concat(swalClasses.header, "\">\n     <ul class=\"").concat(swalClasses['progress-steps'], "\"></ul>\n     <div class=\"").concat(swalClasses.icon, " ").concat(iconTypes.error, "\"></div>\n     <div class=\"").concat(swalClasses.icon, " ").concat(iconTypes.question, "\"></div>\n     <div class=\"").concat(swalClasses.icon, " ").concat(iconTypes.warning, "\"></div>\n     <div class=\"").concat(swalClasses.icon, " ").concat(iconTypes.info, "\"></div>\n     <div class=\"").concat(swalClasses.icon, " ").concat(iconTypes.success, "\"></div>\n     <img class=\"").concat(swalClasses.image, "\" />\n     <h2 class=\"").concat(swalClasses.title, "\" id=\"").concat(swalClasses.title, "\"></h2>\n     <button type=\"button\" class=\"").concat(swalClasses.close, "\"></button>\n   </div>\n   <div class=\"").concat(swalClasses.content, "\">\n     <div id=\"").concat(swalClasses.content, "\"></div>\n     <input class=\"").concat(swalClasses.input, "\" />\n     <input type=\"file\" class=\"").concat(swalClasses.file, "\" />\n     <div class=\"").concat(swalClasses.range, "\">\n       <input type=\"range\" />\n       <output></output>\n     </div>\n     <select class=\"").concat(swalClasses.select, "\"></select>\n     <div class=\"").concat(swalClasses.radio, "\"></div>\n     <label for=\"").concat(swalClasses.checkbox, "\" class=\"").concat(swalClasses.checkbox, "\">\n       <input type=\"checkbox\" />\n       <span class=\"").concat(swalClasses.label, "\"></span>\n     </label>\n     <textarea class=\"").concat(swalClasses.textarea, "\"></textarea>\n     <div class=\"").concat(swalClasses['validation-message'], "\" id=\"").concat(swalClasses['validation-message'], "\"></div>\n   </div>\n   <div class=\"").concat(swalClasses.actions, "\">\n     <button type=\"button\" class=\"").concat(swalClasses.confirm, "\">OK</button>\n     <button type=\"button\" class=\"").concat(swalClasses.cancel, "\">Cancel</button>\n   </div>\n   <div class=\"").concat(swalClasses.footer, "\"></div>\n   <div class=\"").concat(swalClasses['timer-progress-bar'], "\"></div>\n </div>\n").replace(/(^|\n)\s*/g, '');

var resetOldContainer = function resetOldContainer() {
  var oldContainer = getContainer();

  if (!oldContainer) {
    return;
  }

  oldContainer.parentNode.removeChild(oldContainer);
  removeClass([document.documentElement, document.body], [swalClasses['no-backdrop'], swalClasses['toast-shown'], swalClasses['has-column']]);
};

var oldInputVal; // IE11 workaround, see #1109 for details

var resetValidationMessage = function resetValidationMessage(e) {
  if (Swal.isVisible() && oldInputVal !== e.target.value) {
    Swal.resetValidationMessage();
  }

  oldInputVal = e.target.value;
};

var addInputChangeListeners = function addInputChangeListeners() {
  var content = getContent();
  var input = getChildByClass(content, swalClasses.input);
  var file = getChildByClass(content, swalClasses.file);
  var range = content.querySelector(".".concat(swalClasses.range, " input"));
  var rangeOutput = content.querySelector(".".concat(swalClasses.range, " output"));
  var select = getChildByClass(content, swalClasses.select);
  var checkbox = content.querySelector(".".concat(swalClasses.checkbox, " input"));
  var textarea = getChildByClass(content, swalClasses.textarea);
  input.oninput = resetValidationMessage;
  file.onchange = resetValidationMessage;
  select.onchange = resetValidationMessage;
  checkbox.onchange = resetValidationMessage;
  textarea.oninput = resetValidationMessage;

  range.oninput = function (e) {
    resetValidationMessage(e);
    rangeOutput.value = range.value;
  };

  range.onchange = function (e) {
    resetValidationMessage(e);
    range.nextSibling.value = range.value;
  };
};

var getTarget = function getTarget(target) {
  return typeof target === 'string' ? document.querySelector(target) : target;
};

var setupAccessibility = function setupAccessibility(params) {
  var popup = getPopup();
  popup.setAttribute('role', params.toast ? 'alert' : 'dialog');
  popup.setAttribute('aria-live', params.toast ? 'polite' : 'assertive');

  if (!params.toast) {
    popup.setAttribute('aria-modal', 'true');
  }
};

var setupRTL = function setupRTL(targetElement) {
  if (window.getComputedStyle(targetElement).direction === 'rtl') {
    addClass(getContainer(), swalClasses.rtl);
  }
};
/*
 * Add modal + backdrop to DOM
 */


var init = function init(params) {
  // Clean up the old popup container if it exists
  resetOldContainer();
  /* istanbul ignore if */

  if (isNodeEnv()) {
    error('SweetAlert2 requires document to initialize');
    return;
  }

  var container = document.createElement('div');
  container.className = swalClasses.container;
  container.innerHTML = sweetHTML;
  var targetElement = getTarget(params.target);
  targetElement.appendChild(container);
  setupAccessibility(params);
  setupRTL(targetElement);
  addInputChangeListeners();
};

var parseHtmlToContainer = function parseHtmlToContainer(param, target) {
  // DOM element
  if (param instanceof HTMLElement) {
    target.appendChild(param); // JQuery element(s)
  } else if (_typeof(param) === 'object') {
    handleJqueryElem(target, param); // Plain string
  } else if (param) {
    target.innerHTML = param;
  }
};

var handleJqueryElem = function handleJqueryElem(target, elem) {
  target.innerHTML = '';

  if (0 in elem) {
    for (var i = 0; i in elem; i++) {
      target.appendChild(elem[i].cloneNode(true));
    }
  } else {
    target.appendChild(elem.cloneNode(true));
  }
};

var animationEndEvent = function () {
  // Prevent run in Node env

  /* istanbul ignore if */
  if (isNodeEnv()) {
    return false;
  }

  var testEl = document.createElement('div');
  var transEndEventNames = {
    WebkitAnimation: 'webkitAnimationEnd',
    OAnimation: 'oAnimationEnd oanimationend',
    animation: 'animationend'
  };

  for (var i in transEndEventNames) {
    if (Object.prototype.hasOwnProperty.call(transEndEventNames, i) && typeof testEl.style[i] !== 'undefined') {
      return transEndEventNames[i];
    }
  }

  return false;
}();

// https://github.com/twbs/bootstrap/blob/master/js/src/modal.js

var measureScrollbar = function measureScrollbar() {
  var scrollDiv = document.createElement('div');
  scrollDiv.className = swalClasses['scrollbar-measure'];
  document.body.appendChild(scrollDiv);
  var scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
  document.body.removeChild(scrollDiv);
  return scrollbarWidth;
};

var renderActions = function renderActions(instance, params) {
  var actions = getActions();
  var confirmButton = getConfirmButton();
  var cancelButton = getCancelButton(); // Actions (buttons) wrapper

  if (!params.showConfirmButton && !params.showCancelButton) {
    hide(actions);
  } // Custom class


  applyCustomClass(actions, params, 'actions'); // Render confirm button

  renderButton(confirmButton, 'confirm', params); // render Cancel Button

  renderButton(cancelButton, 'cancel', params);

  if (params.buttonsStyling) {
    handleButtonsStyling(confirmButton, cancelButton, params);
  } else {
    removeClass([confirmButton, cancelButton], swalClasses.styled);
    confirmButton.style.backgroundColor = confirmButton.style.borderLeftColor = confirmButton.style.borderRightColor = '';
    cancelButton.style.backgroundColor = cancelButton.style.borderLeftColor = cancelButton.style.borderRightColor = '';
  }

  if (params.reverseButtons) {
    confirmButton.parentNode.insertBefore(cancelButton, confirmButton);
  }
};

function handleButtonsStyling(confirmButton, cancelButton, params) {
  addClass([confirmButton, cancelButton], swalClasses.styled); // Buttons background colors

  if (params.confirmButtonColor) {
    confirmButton.style.backgroundColor = params.confirmButtonColor;
  }

  if (params.cancelButtonColor) {
    cancelButton.style.backgroundColor = params.cancelButtonColor;
  } // Loading state


  var confirmButtonBackgroundColor = window.getComputedStyle(confirmButton).getPropertyValue('background-color');
  confirmButton.style.borderLeftColor = confirmButtonBackgroundColor;
  confirmButton.style.borderRightColor = confirmButtonBackgroundColor;
}

function renderButton(button, buttonType, params) {
  toggle(button, params["show".concat(capitalizeFirstLetter(buttonType), "Button")], 'inline-block');
  button.innerHTML = params["".concat(buttonType, "ButtonText")]; // Set caption text

  button.setAttribute('aria-label', params["".concat(buttonType, "ButtonAriaLabel")]); // ARIA label
  // Add buttons custom classes

  button.className = swalClasses[buttonType];
  applyCustomClass(button, params, "".concat(buttonType, "Button"));
  addClass(button, params["".concat(buttonType, "ButtonClass")]);
}

function handleBackdropParam(container, backdrop) {
  if (typeof backdrop === 'string') {
    container.style.background = backdrop;
  } else if (!backdrop) {
    addClass([document.documentElement, document.body], swalClasses['no-backdrop']);
  }
}

function handlePositionParam(container, position) {
  if (position in swalClasses) {
    addClass(container, swalClasses[position]);
  } else {
    warn('The "position" parameter is not valid, defaulting to "center"');
    addClass(container, swalClasses.center);
  }
}

function handleGrowParam(container, grow) {
  if (grow && typeof grow === 'string') {
    var growClass = "grow-".concat(grow);

    if (growClass in swalClasses) {
      addClass(container, swalClasses[growClass]);
    }
  }
}

var renderContainer = function renderContainer(instance, params) {
  var container = getContainer();

  if (!container) {
    return;
  }

  handleBackdropParam(container, params.backdrop);

  if (!params.backdrop && params.allowOutsideClick) {
    warn('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`');
  }

  handlePositionParam(container, params.position);
  handleGrowParam(container, params.grow); // Custom class

  applyCustomClass(container, params, 'container');
};

/**
 * This module containts `WeakMap`s for each effectively-"private  property" that a `Swal` has.
 * For example, to set the private property "foo" of `this` to "bar", you can `privateProps.foo.set(this, 'bar')`
 * This is the approach that Babel will probably take to implement private methods/fields
 *   https://github.com/tc39/proposal-private-methods
 *   https://github.com/babel/babel/pull/7555
 * Once we have the changes from that PR in Babel, and our core class fits reasonable in *one module*
 *   then we can use that language feature.
 */
var privateProps = {
  promise: new WeakMap(),
  innerParams: new WeakMap(),
  domCache: new WeakMap()
};

var inputTypes = ['input', 'file', 'range', 'select', 'radio', 'checkbox', 'textarea'];
var renderInput = function renderInput(instance, params) {
  var content = getContent();
  var innerParams = privateProps.innerParams.get(instance);
  var rerender = !innerParams || params.input !== innerParams.input;
  inputTypes.forEach(function (inputType) {
    var inputClass = swalClasses[inputType];
    var inputContainer = getChildByClass(content, inputClass); // set attributes

    setAttributes(inputType, params.inputAttributes); // set class

    inputContainer.className = inputClass;

    if (rerender) {
      hide(inputContainer);
    }
  });

  if (params.input) {
    if (rerender) {
      showInput(params);
    } // set custom class


    setCustomClass(params);
  }
};

var showInput = function showInput(params) {
  if (!renderInputType[params.input]) {
    return error("Unexpected type of input! Expected \"text\", \"email\", \"password\", \"number\", \"tel\", \"select\", \"radio\", \"checkbox\", \"textarea\", \"file\" or \"url\", got \"".concat(params.input, "\""));
  }

  var inputContainer = getInputContainer(params.input);
  var input = renderInputType[params.input](inputContainer, params);
  show(input); // input autofocus

  setTimeout(function () {
    focusInput(input);
  });
};

var removeAttributes = function removeAttributes(input) {
  for (var i = 0; i < input.attributes.length; i++) {
    var attrName = input.attributes[i].name;

    if (!(['type', 'value', 'style'].indexOf(attrName) !== -1)) {
      input.removeAttribute(attrName);
    }
  }
};

var setAttributes = function setAttributes(inputType, inputAttributes) {
  var input = getInput(getContent(), inputType);

  if (!input) {
    return;
  }

  removeAttributes(input);

  for (var attr in inputAttributes) {
    // Do not set a placeholder for <input type="range">
    // it'll crash Edge, #1298
    if (inputType === 'range' && attr === 'placeholder') {
      continue;
    }

    input.setAttribute(attr, inputAttributes[attr]);
  }
};

var setCustomClass = function setCustomClass(params) {
  var inputContainer = getInputContainer(params.input);

  if (params.customClass) {
    addClass(inputContainer, params.customClass.input);
  }
};

var setInputPlaceholder = function setInputPlaceholder(input, params) {
  if (!input.placeholder || params.inputPlaceholder) {
    input.placeholder = params.inputPlaceholder;
  }
};

var getInputContainer = function getInputContainer(inputType) {
  var inputClass = swalClasses[inputType] ? swalClasses[inputType] : swalClasses.input;
  return getChildByClass(getContent(), inputClass);
};

var renderInputType = {};

renderInputType.text = renderInputType.email = renderInputType.password = renderInputType.number = renderInputType.tel = renderInputType.url = function (input, params) {
  if (typeof params.inputValue === 'string' || typeof params.inputValue === 'number') {
    input.value = params.inputValue;
  } else if (!isPromise(params.inputValue)) {
    warn("Unexpected type of inputValue! Expected \"string\", \"number\" or \"Promise\", got \"".concat(_typeof(params.inputValue), "\""));
  }

  setInputPlaceholder(input, params);
  input.type = params.input;
  return input;
};

renderInputType.file = function (input, params) {
  setInputPlaceholder(input, params);
  return input;
};

renderInputType.range = function (range, params) {
  var rangeInput = range.querySelector('input');
  var rangeOutput = range.querySelector('output');
  rangeInput.value = params.inputValue;
  rangeInput.type = params.input;
  rangeOutput.value = params.inputValue;
  return range;
};

renderInputType.select = function (select, params) {
  select.innerHTML = '';

  if (params.inputPlaceholder) {
    var placeholder = document.createElement('option');
    placeholder.innerHTML = params.inputPlaceholder;
    placeholder.value = '';
    placeholder.disabled = true;
    placeholder.selected = true;
    select.appendChild(placeholder);
  }

  return select;
};

renderInputType.radio = function (radio) {
  radio.innerHTML = '';
  return radio;
};

renderInputType.checkbox = function (checkboxContainer, params) {
  var checkbox = getInput(getContent(), 'checkbox');
  checkbox.value = 1;
  checkbox.id = swalClasses.checkbox;
  checkbox.checked = Boolean(params.inputValue);
  var label = checkboxContainer.querySelector('span');
  label.innerHTML = params.inputPlaceholder;
  return checkboxContainer;
};

renderInputType.textarea = function (textarea, params) {
  textarea.value = params.inputValue;
  setInputPlaceholder(textarea, params);

  if ('MutationObserver' in window) {
    // #1699
    var initialPopupWidth = parseInt(window.getComputedStyle(getPopup()).width);
    var popupPadding = parseInt(window.getComputedStyle(getPopup()).paddingLeft) + parseInt(window.getComputedStyle(getPopup()).paddingRight);

    var outputsize = function outputsize() {
      var contentWidth = textarea.offsetWidth + popupPadding;

      if (contentWidth > initialPopupWidth) {
        getPopup().style.width = "".concat(contentWidth, "px");
      } else {
        getPopup().style.width = null;
      }
    };

    new MutationObserver(outputsize).observe(textarea, {
      attributes: true,
      attributeFilter: ['style']
    });
  }

  return textarea;
};

var renderContent = function renderContent(instance, params) {
  var content = getContent().querySelector("#".concat(swalClasses.content)); // Content as HTML

  if (params.html) {
    parseHtmlToContainer(params.html, content);
    show(content, 'block'); // Content as plain text
  } else if (params.text) {
    content.textContent = params.text;
    show(content, 'block'); // No content
  } else {
    hide(content);
  }

  renderInput(instance, params); // Custom class

  applyCustomClass(getContent(), params, 'content');
};

var renderFooter = function renderFooter(instance, params) {
  var footer = getFooter();
  toggle(footer, params.footer);

  if (params.footer) {
    parseHtmlToContainer(params.footer, footer);
  } // Custom class


  applyCustomClass(footer, params, 'footer');
};

var renderCloseButton = function renderCloseButton(instance, params) {
  var closeButton = getCloseButton();
  closeButton.innerHTML = params.closeButtonHtml; // Custom class

  applyCustomClass(closeButton, params, 'closeButton');
  toggle(closeButton, params.showCloseButton);
  closeButton.setAttribute('aria-label', params.closeButtonAriaLabel);
};

var renderIcon = function renderIcon(instance, params) {
  var innerParams = privateProps.innerParams.get(instance); // if the give icon already rendered, apply the custom class without re-rendering the icon

  if (innerParams && params.icon === innerParams.icon && getIcon()) {
    applyCustomClass(getIcon(), params, 'icon');
    return;
  }

  hideAllIcons();

  if (!params.icon) {
    return;
  }

  if (Object.keys(iconTypes).indexOf(params.icon) !== -1) {
    var icon = elementBySelector(".".concat(swalClasses.icon, ".").concat(iconTypes[params.icon]));
    show(icon); // Custom or default content

    setContent(icon, params);
    adjustSuccessIconBackgoundColor(); // Custom class

    applyCustomClass(icon, params, 'icon'); // Animate icon

    addClass(icon, params.showClass.icon);
  } else {
    error("Unknown icon! Expected \"success\", \"error\", \"warning\", \"info\" or \"question\", got \"".concat(params.icon, "\""));
  }
};

var hideAllIcons = function hideAllIcons() {
  var icons = getIcons();

  for (var i = 0; i < icons.length; i++) {
    hide(icons[i]);
  }
}; // Adjust success icon background color to match the popup background color


var adjustSuccessIconBackgoundColor = function adjustSuccessIconBackgoundColor() {
  var popup = getPopup();
  var popupBackgroundColor = window.getComputedStyle(popup).getPropertyValue('background-color');
  var successIconParts = popup.querySelectorAll('[class^=swal2-success-circular-line], .swal2-success-fix');

  for (var i = 0; i < successIconParts.length; i++) {
    successIconParts[i].style.backgroundColor = popupBackgroundColor;
  }
};

var setContent = function setContent(icon, params) {
  icon.innerHTML = '';

  if (params.iconHtml) {
    icon.innerHTML = iconContent(params.iconHtml);
  } else if (params.icon === 'success') {
    icon.innerHTML = "\n      <div class=\"swal2-success-circular-line-left\"></div>\n      <span class=\"swal2-success-line-tip\"></span> <span class=\"swal2-success-line-long\"></span>\n      <div class=\"swal2-success-ring\"></div> <div class=\"swal2-success-fix\"></div>\n      <div class=\"swal2-success-circular-line-right\"></div>\n    ";
  } else if (params.icon === 'error') {
    icon.innerHTML = "\n      <span class=\"swal2-x-mark\">\n        <span class=\"swal2-x-mark-line-left\"></span>\n        <span class=\"swal2-x-mark-line-right\"></span>\n      </span>\n    ";
  } else {
    var defaultIconHtml = {
      question: '?',
      warning: '!',
      info: 'i'
    };
    icon.innerHTML = iconContent(defaultIconHtml[params.icon]);
  }
};

var iconContent = function iconContent(content) {
  return "<div class=\"".concat(swalClasses['icon-content'], "\">").concat(content, "</div>");
};

var renderImage = function renderImage(instance, params) {
  var image = getImage();

  if (!params.imageUrl) {
    return hide(image);
  }

  show(image); // Src, alt

  image.setAttribute('src', params.imageUrl);
  image.setAttribute('alt', params.imageAlt); // Width, height

  applyNumericalStyle(image, 'width', params.imageWidth);
  applyNumericalStyle(image, 'height', params.imageHeight); // Class

  image.className = swalClasses.image;
  applyCustomClass(image, params, 'image');
};

var createStepElement = function createStepElement(step) {
  var stepEl = document.createElement('li');
  addClass(stepEl, swalClasses['progress-step']);
  stepEl.innerHTML = step;
  return stepEl;
};

var createLineElement = function createLineElement(params) {
  var lineEl = document.createElement('li');
  addClass(lineEl, swalClasses['progress-step-line']);

  if (params.progressStepsDistance) {
    lineEl.style.width = params.progressStepsDistance;
  }

  return lineEl;
};

var renderProgressSteps = function renderProgressSteps(instance, params) {
  var progressStepsContainer = getProgressSteps();

  if (!params.progressSteps || params.progressSteps.length === 0) {
    return hide(progressStepsContainer);
  }

  show(progressStepsContainer);
  progressStepsContainer.innerHTML = '';
  var currentProgressStep = parseInt(params.currentProgressStep === null ? Swal.getQueueStep() : params.currentProgressStep);

  if (currentProgressStep >= params.progressSteps.length) {
    warn('Invalid currentProgressStep parameter, it should be less than progressSteps.length ' + '(currentProgressStep like JS arrays starts from 0)');
  }

  params.progressSteps.forEach(function (step, index) {
    var stepEl = createStepElement(step);
    progressStepsContainer.appendChild(stepEl);

    if (index === currentProgressStep) {
      addClass(stepEl, swalClasses['active-progress-step']);
    }

    if (index !== params.progressSteps.length - 1) {
      var lineEl = createLineElement(step);
      progressStepsContainer.appendChild(lineEl);
    }
  });
};

var renderTitle = function renderTitle(instance, params) {
  var title = getTitle();
  toggle(title, params.title || params.titleText);

  if (params.title) {
    parseHtmlToContainer(params.title, title);
  }

  if (params.titleText) {
    title.innerText = params.titleText;
  } // Custom class


  applyCustomClass(title, params, 'title');
};

var renderHeader = function renderHeader(instance, params) {
  var header = getHeader(); // Custom class

  applyCustomClass(header, params, 'header'); // Progress steps

  renderProgressSteps(instance, params); // Icon

  renderIcon(instance, params); // Image

  renderImage(instance, params); // Title

  renderTitle(instance, params); // Close button

  renderCloseButton(instance, params);
};

var renderPopup = function renderPopup(instance, params) {
  var popup = getPopup(); // Width

  applyNumericalStyle(popup, 'width', params.width); // Padding

  applyNumericalStyle(popup, 'padding', params.padding); // Background

  if (params.background) {
    popup.style.background = params.background;
  } // Default Class


  popup.className = swalClasses.popup;

  if (params.toast) {
    addClass([document.documentElement, document.body], swalClasses['toast-shown']);
    addClass(popup, swalClasses.toast);
  } else {
    addClass(popup, swalClasses.modal);
  } // Custom class


  applyCustomClass(popup, params, 'popup');

  if (typeof params.customClass === 'string') {
    addClass(popup, params.customClass);
  } // Add showClass when updating Swal.update({})


  if (isVisible(popup)) {
    addClass(popup, params.showClass.popup);
  }
};

var render = function render(instance, params) {
  renderPopup(instance, params);
  renderContainer(instance, params);
  renderHeader(instance, params);
  renderContent(instance, params);
  renderActions(instance, params);
  renderFooter(instance, params);

  if (typeof params.onRender === 'function') {
    params.onRender(getPopup());
  }
};

/*
 * Global function to determine if SweetAlert2 popup is shown
 */

var isVisible$1 = function isVisible$$1() {
  return isVisible(getPopup());
};
/*
 * Global function to click 'Confirm' button
 */

var clickConfirm = function clickConfirm() {
  return getConfirmButton() && getConfirmButton().click();
};
/*
 * Global function to click 'Cancel' button
 */

var clickCancel = function clickCancel() {
  return getCancelButton() && getCancelButton().click();
};

function fire() {
  var Swal = this;

  for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
    args[_key] = arguments[_key];
  }

  return _construct(Swal, args);
}

/**
 * Returns an extended version of `Swal` containing `params` as defaults.
 * Useful for reusing Swal configuration.
 *
 * For example:
 *
 * Before:
 * const textPromptOptions = { input: 'text', showCancelButton: true }
 * const {value: firstName} = await Swal.fire({ ...textPromptOptions, title: 'What is your first name?' })
 * const {value: lastName} = await Swal.fire({ ...textPromptOptions, title: 'What is your last name?' })
 *
 * After:
 * const TextPrompt = Swal.mixin({ input: 'text', showCancelButton: true })
 * const {value: firstName} = await TextPrompt('What is your first name?')
 * const {value: lastName} = await TextPrompt('What is your last name?')
 *
 * @param mixinParams
 */
function mixin(mixinParams) {
  var MixinSwal =
  /*#__PURE__*/
  function (_this) {
    _inherits(MixinSwal, _this);

    function MixinSwal() {
      _classCallCheck(this, MixinSwal);

      return _possibleConstructorReturn(this, _getPrototypeOf(MixinSwal).apply(this, arguments));
    }

    _createClass(MixinSwal, [{
      key: "_main",
      value: function _main(params) {
        return _get(_getPrototypeOf(MixinSwal.prototype), "_main", this).call(this, _extends({}, mixinParams, params));
      }
    }]);

    return MixinSwal;
  }(this);

  return MixinSwal;
}

// private global state for the queue feature
var currentSteps = [];
/*
 * Global function for chaining sweetAlert popups
 */

var queue = function queue(steps) {
  var Swal = this;
  currentSteps = steps;

  var resetAndResolve = function resetAndResolve(resolve, value) {
    currentSteps = [];
    document.body.removeAttribute('data-swal2-queue-step');
    resolve(value);
  };

  var queueResult = [];
  return new Promise(function (resolve) {
    (function step(i, callback) {
      if (i < currentSteps.length) {
        document.body.setAttribute('data-swal2-queue-step', i);
        Swal.fire(currentSteps[i]).then(function (result) {
          if (typeof result.value !== 'undefined') {
            queueResult.push(result.value);
            step(i + 1, callback);
          } else {
            resetAndResolve(resolve, {
              dismiss: result.dismiss
            });
          }
        });
      } else {
        resetAndResolve(resolve, {
          value: queueResult
        });
      }
    })(0);
  });
};
/*
 * Global function for getting the index of current popup in queue
 */

var getQueueStep = function getQueueStep() {
  return document.body.getAttribute('data-swal2-queue-step');
};
/*
 * Global function for inserting a popup to the queue
 */

var insertQueueStep = function insertQueueStep(step, index) {
  if (index && index < currentSteps.length) {
    return currentSteps.splice(index, 0, step);
  }

  return currentSteps.push(step);
};
/*
 * Global function for deleting a popup from the queue
 */

var deleteQueueStep = function deleteQueueStep(index) {
  if (typeof currentSteps[index] !== 'undefined') {
    currentSteps.splice(index, 1);
  }
};

/**
 * Show spinner instead of Confirm button
 */

var showLoading = function showLoading() {
  var popup = getPopup();

  if (!popup) {
    Swal.fire();
  }

  popup = getPopup();
  var actions = getActions();
  var confirmButton = getConfirmButton();
  show(actions);
  show(confirmButton, 'inline-block');
  addClass([popup, actions], swalClasses.loading);
  confirmButton.disabled = true;
  popup.setAttribute('data-loading', true);
  popup.setAttribute('aria-busy', true);
  popup.focus();
};

var RESTORE_FOCUS_TIMEOUT = 100;

var globalState = {};
var focusPreviousActiveElement = function focusPreviousActiveElement() {
  if (globalState.previousActiveElement && globalState.previousActiveElement.focus) {
    globalState.previousActiveElement.focus();
    globalState.previousActiveElement = null;
  } else if (document.body) {
    document.body.focus();
  }
}; // Restore previous active (focused) element


var restoreActiveElement = function restoreActiveElement() {
  return new Promise(function (resolve) {
    var x = window.scrollX;
    var y = window.scrollY;
    globalState.restoreFocusTimeout = setTimeout(function () {
      focusPreviousActiveElement();
      resolve();
    }, RESTORE_FOCUS_TIMEOUT); // issues/900

    if (typeof x !== 'undefined' && typeof y !== 'undefined') {
      // IE doesn't have scrollX/scrollY support
      window.scrollTo(x, y);
    }
  });
};

/**
 * If `timer` parameter is set, returns number of milliseconds of timer remained.
 * Otherwise, returns undefined.
 */

var getTimerLeft = function getTimerLeft() {
  return globalState.timeout && globalState.timeout.getTimerLeft();
};
/**
 * Stop timer. Returns number of milliseconds of timer remained.
 * If `timer` parameter isn't set, returns undefined.
 */

var stopTimer = function stopTimer() {
  if (globalState.timeout) {
    stopTimerProgressBar();
    return globalState.timeout.stop();
  }
};
/**
 * Resume timer. Returns number of milliseconds of timer remained.
 * If `timer` parameter isn't set, returns undefined.
 */

var resumeTimer = function resumeTimer() {
  if (globalState.timeout) {
    var remaining = globalState.timeout.start();
    animateTimerProgressBar(remaining);
    return remaining;
  }
};
/**
 * Resume timer. Returns number of milliseconds of timer remained.
 * If `timer` parameter isn't set, returns undefined.
 */

var toggleTimer = function toggleTimer() {
  var timer = globalState.timeout;
  return timer && (timer.running ? stopTimer() : resumeTimer());
};
/**
 * Increase timer. Returns number of milliseconds of an updated timer.
 * If `timer` parameter isn't set, returns undefined.
 */

var increaseTimer = function increaseTimer(n) {
  if (globalState.timeout) {
    var remaining = globalState.timeout.increase(n);
    animateTimerProgressBar(remaining, true);
    return remaining;
  }
};
/**
 * Check if timer is running. Returns true if timer is running
 * or false if timer is paused or stopped.
 * If `timer` parameter isn't set, returns undefined
 */

var isTimerRunning = function isTimerRunning() {
  return globalState.timeout && globalState.timeout.isRunning();
};

var defaultParams = {
  title: '',
  titleText: '',
  text: '',
  html: '',
  footer: '',
  icon: null,
  iconHtml: null,
  toast: false,
  animation: true,
  showClass: {
    popup: 'swal2-show',
    backdrop: 'swal2-backdrop-show',
    icon: 'swal2-icon-show'
  },
  hideClass: {
    popup: 'swal2-hide',
    backdrop: 'swal2-backdrop-hide',
    icon: 'swal2-icon-hide'
  },
  customClass: '',
  target: 'body',
  backdrop: true,
  heightAuto: true,
  allowOutsideClick: true,
  allowEscapeKey: true,
  allowEnterKey: true,
  stopKeydownPropagation: true,
  keydownListenerCapture: false,
  showConfirmButton: true,
  showCancelButton: false,
  preConfirm: null,
  confirmButtonText: 'OK',
  confirmButtonAriaLabel: '',
  confirmButtonColor: null,
  cancelButtonText: 'Cancel',
  cancelButtonAriaLabel: '',
  cancelButtonColor: null,
  buttonsStyling: true,
  reverseButtons: false,
  focusConfirm: true,
  focusCancel: false,
  showCloseButton: false,
  closeButtonHtml: '&times;',
  closeButtonAriaLabel: 'Close this dialog',
  showLoaderOnConfirm: false,
  imageUrl: null,
  imageWidth: null,
  imageHeight: null,
  imageAlt: '',
  timer: null,
  timerProgressBar: false,
  width: null,
  padding: null,
  background: null,
  input: null,
  inputPlaceholder: '',
  inputValue: '',
  inputOptions: {},
  inputAutoTrim: true,
  inputAttributes: {},
  inputValidator: null,
  validationMessage: null,
  grow: false,
  position: 'center',
  progressSteps: [],
  currentProgressStep: null,
  progressStepsDistance: null,
  onBeforeOpen: null,
  onOpen: null,
  onRender: null,
  onClose: null,
  onAfterClose: null,
  scrollbarPadding: true
};
var updatableParams = ['title', 'titleText', 'text', 'html', 'icon', 'customClass', 'showConfirmButton', 'showCancelButton', 'confirmButtonText', 'confirmButtonAriaLabel', 'confirmButtonColor', 'cancelButtonText', 'cancelButtonAriaLabel', 'cancelButtonColor', 'buttonsStyling', 'reverseButtons', 'imageUrl', 'imageWidth', 'imageHeight', 'imageAlt', 'progressSteps', 'currentProgressStep'];
var deprecatedParams = {
  animation: 'showClass" and "hideClass'
};
var toastIncompatibleParams = ['allowOutsideClick', 'allowEnterKey', 'backdrop', 'focusConfirm', 'focusCancel', 'heightAuto', 'keydownListenerCapture'];
/**
 * Is valid parameter
 * @param {String} paramName
 */

var isValidParameter = function isValidParameter(paramName) {
  return Object.prototype.hasOwnProperty.call(defaultParams, paramName);
};
/**
 * Is valid parameter for Swal.update() method
 * @param {String} paramName
 */

var isUpdatableParameter = function isUpdatableParameter(paramName) {
  return updatableParams.indexOf(paramName) !== -1;
};
/**
 * Is deprecated parameter
 * @param {String} paramName
 */

var isDeprecatedParameter = function isDeprecatedParameter(paramName) {
  return deprecatedParams[paramName];
};

var checkIfParamIsValid = function checkIfParamIsValid(param) {
  if (!isValidParameter(param)) {
    warn("Unknown parameter \"".concat(param, "\""));
  }
};

var checkIfToastParamIsValid = function checkIfToastParamIsValid(param) {
  if (toastIncompatibleParams.indexOf(param) !== -1) {
    warn("The parameter \"".concat(param, "\" is incompatible with toasts"));
  }
};

var checkIfParamIsDeprecated = function checkIfParamIsDeprecated(param) {
  if (isDeprecatedParameter(param)) {
    warnAboutDepreation(param, isDeprecatedParameter(param));
  }
};
/**
 * Show relevant warnings for given params
 *
 * @param params
 */


var showWarningsForParams = function showWarningsForParams(params) {
  for (var param in params) {
    checkIfParamIsValid(param);

    if (params.toast) {
      checkIfToastParamIsValid(param);
    }

    checkIfParamIsDeprecated(param);
  }
};



var staticMethods = Object.freeze({
	isValidParameter: isValidParameter,
	isUpdatableParameter: isUpdatableParameter,
	isDeprecatedParameter: isDeprecatedParameter,
	argsToParams: argsToParams,
	isVisible: isVisible$1,
	clickConfirm: clickConfirm,
	clickCancel: clickCancel,
	getContainer: getContainer,
	getPopup: getPopup,
	getTitle: getTitle,
	getContent: getContent,
	getImage: getImage,
	getIcon: getIcon,
	getIcons: getIcons,
	getCloseButton: getCloseButton,
	getActions: getActions,
	getConfirmButton: getConfirmButton,
	getCancelButton: getCancelButton,
	getHeader: getHeader,
	getFooter: getFooter,
	getFocusableElements: getFocusableElements,
	getValidationMessage: getValidationMessage,
	isLoading: isLoading,
	fire: fire,
	mixin: mixin,
	queue: queue,
	getQueueStep: getQueueStep,
	insertQueueStep: insertQueueStep,
	deleteQueueStep: deleteQueueStep,
	showLoading: showLoading,
	enableLoading: showLoading,
	getTimerLeft: getTimerLeft,
	stopTimer: stopTimer,
	resumeTimer: resumeTimer,
	toggleTimer: toggleTimer,
	increaseTimer: increaseTimer,
	isTimerRunning: isTimerRunning
});

/**
 * Enables buttons and hide loader.
 */

function hideLoading() {
  var innerParams = privateProps.innerParams.get(this);
  var domCache = privateProps.domCache.get(this);

  if (!innerParams.showConfirmButton) {
    hide(domCache.confirmButton);

    if (!innerParams.showCancelButton) {
      hide(domCache.actions);
    }
  }

  removeClass([domCache.popup, domCache.actions], swalClasses.loading);
  domCache.popup.removeAttribute('aria-busy');
  domCache.popup.removeAttribute('data-loading');
  domCache.confirmButton.disabled = false;
  domCache.cancelButton.disabled = false;
}

function getInput$1(instance) {
  var innerParams = privateProps.innerParams.get(instance || this);
  var domCache = privateProps.domCache.get(instance || this);

  if (!domCache) {
    return null;
  }

  return getInput(domCache.content, innerParams.input);
}

var fixScrollbar = function fixScrollbar() {
  // for queues, do not do this more than once
  if (states.previousBodyPadding !== null) {
    return;
  } // if the body has overflow


  if (document.body.scrollHeight > window.innerHeight) {
    // add padding so the content doesn't shift after removal of scrollbar
    states.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue('padding-right'));
    document.body.style.paddingRight = "".concat(states.previousBodyPadding + measureScrollbar(), "px");
  }
};
var undoScrollbar = function undoScrollbar() {
  if (states.previousBodyPadding !== null) {
    document.body.style.paddingRight = "".concat(states.previousBodyPadding, "px");
    states.previousBodyPadding = null;
  }
};

/* istanbul ignore next */

var iOSfix = function iOSfix() {
  var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1;

  if (iOS && !hasClass(document.body, swalClasses.iosfix)) {
    var offset = document.body.scrollTop;
    document.body.style.top = "".concat(offset * -1, "px");
    addClass(document.body, swalClasses.iosfix);
    lockBodyScroll();
  }
};
/* istanbul ignore next */

var lockBodyScroll = function lockBodyScroll() {
  // #1246
  var container = getContainer();
  var preventTouchMove;

  container.ontouchstart = function (e) {
    preventTouchMove = e.target === container || !isScrollable(container) && e.target.tagName !== 'INPUT' // #1603
    ;
  };

  container.ontouchmove = function (e) {
    if (preventTouchMove) {
      e.preventDefault();
      e.stopPropagation();
    }
  };
};
/* istanbul ignore next */


var undoIOSfix = function undoIOSfix() {
  if (hasClass(document.body, swalClasses.iosfix)) {
    var offset = parseInt(document.body.style.top, 10);
    removeClass(document.body, swalClasses.iosfix);
    document.body.style.top = '';
    document.body.scrollTop = offset * -1;
  }
};

var isIE11 = function isIE11() {
  return !!window.MSInputMethodContext && !!document.documentMode;
}; // Fix IE11 centering sweetalert2/issues/933

/* istanbul ignore next */


var fixVerticalPositionIE = function fixVerticalPositionIE() {
  var container = getContainer();
  var popup = getPopup();
  container.style.removeProperty('align-items');

  if (popup.offsetTop < 0) {
    container.style.alignItems = 'flex-start';
  }
};
/* istanbul ignore next */


var IEfix = function IEfix() {
  if (typeof window !== 'undefined' && isIE11()) {
    fixVerticalPositionIE();
    window.addEventListener('resize', fixVerticalPositionIE);
  }
};
/* istanbul ignore next */

var undoIEfix = function undoIEfix() {
  if (typeof window !== 'undefined' && isIE11()) {
    window.removeEventListener('resize', fixVerticalPositionIE);
  }
};

// Adding aria-hidden="true" to elements outside of the active modal dialog ensures that
// elements not within the active modal dialog will not be surfaced if a user opens a screen
// reader’s list of elements (headings, form controls, landmarks, etc.) in the document.

var setAriaHidden = function setAriaHidden() {
  var bodyChildren = toArray(document.body.children);
  bodyChildren.forEach(function (el) {
    if (el === getContainer() || contains(el, getContainer())) {
      return;
    }

    if (el.hasAttribute('aria-hidden')) {
      el.setAttribute('data-previous-aria-hidden', el.getAttribute('aria-hidden'));
    }

    el.setAttribute('aria-hidden', 'true');
  });
};
var unsetAriaHidden = function unsetAriaHidden() {
  var bodyChildren = toArray(document.body.children);
  bodyChildren.forEach(function (el) {
    if (el.hasAttribute('data-previous-aria-hidden')) {
      el.setAttribute('aria-hidden', el.getAttribute('data-previous-aria-hidden'));
      el.removeAttribute('data-previous-aria-hidden');
    } else {
      el.removeAttribute('aria-hidden');
    }
  });
};

/**
 * This module containts `WeakMap`s for each effectively-"private  property" that a `Swal` has.
 * For example, to set the private property "foo" of `this` to "bar", you can `privateProps.foo.set(this, 'bar')`
 * This is the approach that Babel will probably take to implement private methods/fields
 *   https://github.com/tc39/proposal-private-methods
 *   https://github.com/babel/babel/pull/7555
 * Once we have the changes from that PR in Babel, and our core class fits reasonable in *one module*
 *   then we can use that language feature.
 */
var privateMethods = {
  swalPromiseResolve: new WeakMap()
};

/*
 * Instance method to close sweetAlert
 */

function removePopupAndResetState(instance, container, isToast, onAfterClose) {
  if (isToast) {
    triggerOnAfterCloseAndDispose(instance, onAfterClose);
  } else {
    restoreActiveElement().then(function () {
      return triggerOnAfterCloseAndDispose(instance, onAfterClose);
    });
    globalState.keydownTarget.removeEventListener('keydown', globalState.keydownHandler, {
      capture: globalState.keydownListenerCapture
    });
    globalState.keydownHandlerAdded = false;
  }

  if (container.parentNode) {
    container.parentNode.removeChild(container);
  }

  if (isModal()) {
    undoScrollbar();
    undoIOSfix();
    undoIEfix();
    unsetAriaHidden();
  }

  removeBodyClasses();
}

function removeBodyClasses() {
  removeClass([document.documentElement, document.body], [swalClasses.shown, swalClasses['height-auto'], swalClasses['no-backdrop'], swalClasses['toast-shown'], swalClasses['toast-column']]);
}

function disposeSwal(instance) {
  // Unset this.params so GC will dispose it (#1569)
  delete instance.params; // Unset globalState props so GC will dispose globalState (#1569)

  delete globalState.keydownHandler;
  delete globalState.keydownTarget; // Unset WeakMaps so GC will be able to dispose them (#1569)

  unsetWeakMaps(privateProps);
  unsetWeakMaps(privateMethods);
}

function close(resolveValue) {
  var popup = getPopup();

  if (!popup) {
    return;
  }

  var innerParams = privateProps.innerParams.get(this);

  if (!innerParams || hasClass(popup, innerParams.hideClass.popup)) {
    return;
  }

  var swalPromiseResolve = privateMethods.swalPromiseResolve.get(this);
  removeClass(popup, innerParams.showClass.popup);
  addClass(popup, innerParams.hideClass.popup);
  var backdrop = getContainer();
  removeClass(backdrop, innerParams.showClass.backdrop);
  addClass(backdrop, innerParams.hideClass.backdrop);
  handlePopupAnimation(this, popup, innerParams); // Resolve Swal promise

  swalPromiseResolve(resolveValue || {});
}

var handlePopupAnimation = function handlePopupAnimation(instance, popup, innerParams) {
  var container = getContainer(); // If animation is supported, animate

  var animationIsSupported = animationEndEvent && hasCssAnimation(popup);
  var onClose = innerParams.onClose,
      onAfterClose = innerParams.onAfterClose;

  if (onClose !== null && typeof onClose === 'function') {
    onClose(popup);
  }

  if (animationIsSupported) {
    animatePopup(instance, popup, container, onAfterClose);
  } else {
    // Otherwise, remove immediately
    removePopupAndResetState(instance, container, isToast(), onAfterClose);
  }
};

var animatePopup = function animatePopup(instance, popup, container, onAfterClose) {
  globalState.swalCloseEventFinishedCallback = removePopupAndResetState.bind(null, instance, container, isToast(), onAfterClose);
  popup.addEventListener(animationEndEvent, function (e) {
    if (e.target === popup) {
      globalState.swalCloseEventFinishedCallback();
      delete globalState.swalCloseEventFinishedCallback;
    }
  });
};

var unsetWeakMaps = function unsetWeakMaps(obj) {
  for (var i in obj) {
    obj[i] = new WeakMap();
  }
};

var triggerOnAfterCloseAndDispose = function triggerOnAfterCloseAndDispose(instance, onAfterClose) {
  setTimeout(function () {
    if (onAfterClose !== null && typeof onAfterClose === 'function') {
      onAfterClose();
    }

    if (!getPopup()) {
      disposeSwal(instance);
    }
  });
};

function setButtonsDisabled(instance, buttons, disabled) {
  var domCache = privateProps.domCache.get(instance);
  buttons.forEach(function (button) {
    domCache[button].disabled = disabled;
  });
}

function setInputDisabled(input, disabled) {
  if (!input) {
    return false;
  }

  if (input.type === 'radio') {
    var radiosContainer = input.parentNode.parentNode;
    var radios = radiosContainer.querySelectorAll('input');

    for (var i = 0; i < radios.length; i++) {
      radios[i].disabled = disabled;
    }
  } else {
    input.disabled = disabled;
  }
}

function enableButtons() {
  setButtonsDisabled(this, ['confirmButton', 'cancelButton'], false);
}
function disableButtons() {
  setButtonsDisabled(this, ['confirmButton', 'cancelButton'], true);
}
function enableInput() {
  return setInputDisabled(this.getInput(), false);
}
function disableInput() {
  return setInputDisabled(this.getInput(), true);
}

function showValidationMessage(error) {
  var domCache = privateProps.domCache.get(this);
  domCache.validationMessage.innerHTML = error;
  var popupComputedStyle = window.getComputedStyle(domCache.popup);
  domCache.validationMessage.style.marginLeft = "-".concat(popupComputedStyle.getPropertyValue('padding-left'));
  domCache.validationMessage.style.marginRight = "-".concat(popupComputedStyle.getPropertyValue('padding-right'));
  show(domCache.validationMessage);
  var input = this.getInput();

  if (input) {
    input.setAttribute('aria-invalid', true);
    input.setAttribute('aria-describedBy', swalClasses['validation-message']);
    focusInput(input);
    addClass(input, swalClasses.inputerror);
  }
} // Hide block with validation message

function resetValidationMessage$1() {
  var domCache = privateProps.domCache.get(this);

  if (domCache.validationMessage) {
    hide(domCache.validationMessage);
  }

  var input = this.getInput();

  if (input) {
    input.removeAttribute('aria-invalid');
    input.removeAttribute('aria-describedBy');
    removeClass(input, swalClasses.inputerror);
  }
}

function getProgressSteps$1() {
  var domCache = privateProps.domCache.get(this);
  return domCache.progressSteps;
}

var Timer =
/*#__PURE__*/
function () {
  function Timer(callback, delay) {
    _classCallCheck(this, Timer);

    this.callback = callback;
    this.remaining = delay;
    this.running = false;
    this.start();
  }

  _createClass(Timer, [{
    key: "start",
    value: function start() {
      if (!this.running) {
        this.running = true;
        this.started = new Date();
        this.id = setTimeout(this.callback, this.remaining);
      }

      return this.remaining;
    }
  }, {
    key: "stop",
    value: function stop() {
      if (this.running) {
        this.running = false;
        clearTimeout(this.id);
        this.remaining -= new Date() - this.started;
      }

      return this.remaining;
    }
  }, {
    key: "increase",
    value: function increase(n) {
      var running = this.running;

      if (running) {
        this.stop();
      }

      this.remaining += n;

      if (running) {
        this.start();
      }

      return this.remaining;
    }
  }, {
    key: "getTimerLeft",
    value: function getTimerLeft() {
      if (this.running) {
        this.stop();
        this.start();
      }

      return this.remaining;
    }
  }, {
    key: "isRunning",
    value: function isRunning() {
      return this.running;
    }
  }]);

  return Timer;
}();

var defaultInputValidators = {
  email: function email(string, validationMessage) {
    return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(string) ? Promise.resolve() : Promise.resolve(validationMessage || 'Invalid email address');
  },
  url: function url(string, validationMessage) {
    // taken from https://stackoverflow.com/a/3809435 with a small change from #1306
    return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{2,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(string) ? Promise.resolve() : Promise.resolve(validationMessage || 'Invalid URL');
  }
};

function setDefaultInputValidators(params) {
  // Use default `inputValidator` for supported input types if not provided
  if (!params.inputValidator) {
    Object.keys(defaultInputValidators).forEach(function (key) {
      if (params.input === key) {
        params.inputValidator = defaultInputValidators[key];
      }
    });
  }
}

function validateCustomTargetElement(params) {
  // Determine if the custom target element is valid
  if (!params.target || typeof params.target === 'string' && !document.querySelector(params.target) || typeof params.target !== 'string' && !params.target.appendChild) {
    warn('Target parameter is not valid, defaulting to "body"');
    params.target = 'body';
  }
}
/**
 * Set type, text and actions on popup
 *
 * @param params
 * @returns {boolean}
 */


function setParameters(params) {
  setDefaultInputValidators(params); // showLoaderOnConfirm && preConfirm

  if (params.showLoaderOnConfirm && !params.preConfirm) {
    warn('showLoaderOnConfirm is set to true, but preConfirm is not defined.\n' + 'showLoaderOnConfirm should be used together with preConfirm, see usage example:\n' + 'https://sweetalert2.github.io/#ajax-request');
  } // params.animation will be actually used in renderPopup.js
  // but in case when params.animation is a function, we need to call that function
  // before popup (re)initialization, so it'll be possible to check Swal.isVisible()
  // inside the params.animation function


  params.animation = callIfFunction(params.animation);
  validateCustomTargetElement(params); // Replace newlines with <br> in title

  if (typeof params.title === 'string') {
    params.title = params.title.split('\n').join('<br />');
  }

  init(params);
}

function swalOpenAnimationFinished(popup, container) {
  popup.removeEventListener(animationEndEvent, swalOpenAnimationFinished);
  container.style.overflowY = 'auto';
}
/**
 * Open popup, add necessary classes and styles, fix scrollbar
 *
 * @param {Array} params
 */


var openPopup = function openPopup(params) {
  var container = getContainer();
  var popup = getPopup();

  if (typeof params.onBeforeOpen === 'function') {
    params.onBeforeOpen(popup);
  }

  addClasses(container, popup, params); // scrolling is 'hidden' until animation is done, after that 'auto'

  setScrollingVisibility(container, popup);

  if (isModal()) {
    fixScrollContainer(container, params.scrollbarPadding);
  }

  if (!isToast() && !globalState.previousActiveElement) {
    globalState.previousActiveElement = document.activeElement;
  }

  if (typeof params.onOpen === 'function') {
    setTimeout(function () {
      return params.onOpen(popup);
    });
  }
};

var setScrollingVisibility = function setScrollingVisibility(container, popup) {
  if (animationEndEvent && hasCssAnimation(popup)) {
    container.style.overflowY = 'hidden';
    popup.addEventListener(animationEndEvent, swalOpenAnimationFinished.bind(null, popup, container));
  } else {
    container.style.overflowY = 'auto';
  }
};

var fixScrollContainer = function fixScrollContainer(container, scrollbarPadding) {
  iOSfix();
  IEfix();
  setAriaHidden();

  if (scrollbarPadding) {
    fixScrollbar();
  } // sweetalert2/issues/1247


  setTimeout(function () {
    container.scrollTop = 0;
  });
};

var addClasses = function addClasses(container, popup, params) {
  addClass(container, params.showClass.backdrop);
  show(popup); // Animate popup right after showing it

  addClass(popup, params.showClass.popup);
  addClass([document.documentElement, document.body], swalClasses.shown);

  if (params.heightAuto && params.backdrop && !params.toast) {
    addClass([document.documentElement, document.body], swalClasses['height-auto']);
  }
};

var handleInputOptionsAndValue = function handleInputOptionsAndValue(instance, params) {
  if (params.input === 'select' || params.input === 'radio') {
    handleInputOptions(instance, params);
  } else if (['text', 'email', 'number', 'tel', 'textarea'].indexOf(params.input) !== -1 && isPromise(params.inputValue)) {
    handleInputValue(instance, params);
  }
};
var getInputValue = function getInputValue(instance, innerParams) {
  var input = instance.getInput();

  if (!input) {
    return null;
  }

  switch (innerParams.input) {
    case 'checkbox':
      return getCheckboxValue(input);

    case 'radio':
      return getRadioValue(input);

    case 'file':
      return getFileValue(input);

    default:
      return innerParams.inputAutoTrim ? input.value.trim() : input.value;
  }
};

var getCheckboxValue = function getCheckboxValue(input) {
  return input.checked ? 1 : 0;
};

var getRadioValue = function getRadioValue(input) {
  return input.checked ? input.value : null;
};

var getFileValue = function getFileValue(input) {
  return input.files.length ? input.getAttribute('multiple') !== null ? input.files : input.files[0] : null;
};

var handleInputOptions = function handleInputOptions(instance, params) {
  var content = getContent();

  var processInputOptions = function processInputOptions(inputOptions) {
    return populateInputOptions[params.input](content, formatInputOptions(inputOptions), params);
  };

  if (isPromise(params.inputOptions)) {
    showLoading();
    params.inputOptions.then(function (inputOptions) {
      instance.hideLoading();
      processInputOptions(inputOptions);
    });
  } else if (_typeof(params.inputOptions) === 'object') {
    processInputOptions(params.inputOptions);
  } else {
    error("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(_typeof(params.inputOptions)));
  }
};

var handleInputValue = function handleInputValue(instance, params) {
  var input = instance.getInput();
  hide(input);
  params.inputValue.then(function (inputValue) {
    input.value = params.input === 'number' ? parseFloat(inputValue) || 0 : "".concat(inputValue);
    show(input);
    input.focus();
    instance.hideLoading();
  })["catch"](function (err) {
    error("Error in inputValue promise: ".concat(err));
    input.value = '';
    show(input);
    input.focus();
    instance.hideLoading();
  });
};

var populateInputOptions = {
  select: function select(content, inputOptions, params) {
    var select = getChildByClass(content, swalClasses.select);
    inputOptions.forEach(function (inputOption) {
      var optionValue = inputOption[0];
      var optionLabel = inputOption[1];
      var option = document.createElement('option');
      option.value = optionValue;
      option.innerHTML = optionLabel;

      if (params.inputValue.toString() === optionValue.toString()) {
        option.selected = true;
      }

      select.appendChild(option);
    });
    select.focus();
  },
  radio: function radio(content, inputOptions, params) {
    var radio = getChildByClass(content, swalClasses.radio);
    inputOptions.forEach(function (inputOption) {
      var radioValue = inputOption[0];
      var radioLabel = inputOption[1];
      var radioInput = document.createElement('input');
      var radioLabelElement = document.createElement('label');
      radioInput.type = 'radio';
      radioInput.name = swalClasses.radio;
      radioInput.value = radioValue;

      if (params.inputValue.toString() === radioValue.toString()) {
        radioInput.checked = true;
      }

      var label = document.createElement('span');
      label.innerHTML = radioLabel;
      label.className = swalClasses.label;
      radioLabelElement.appendChild(radioInput);
      radioLabelElement.appendChild(label);
      radio.appendChild(radioLabelElement);
    });
    var radios = radio.querySelectorAll('input');

    if (radios.length) {
      radios[0].focus();
    }
  }
};
/**
 * Converts `inputOptions` into an array of `[value, label]`s
 * @param inputOptions
 */

var formatInputOptions = function formatInputOptions(inputOptions) {
  var result = [];

  if (typeof Map !== 'undefined' && inputOptions instanceof Map) {
    inputOptions.forEach(function (value, key) {
      result.push([key, value]);
    });
  } else {
    Object.keys(inputOptions).forEach(function (key) {
      result.push([key, inputOptions[key]]);
    });
  }

  return result;
};

var handleConfirmButtonClick = function handleConfirmButtonClick(instance, innerParams) {
  instance.disableButtons();

  if (innerParams.input) {
    handleConfirmWithInput(instance, innerParams);
  } else {
    confirm(instance, innerParams, true);
  }
};
var handleCancelButtonClick = function handleCancelButtonClick(instance, dismissWith) {
  instance.disableButtons();
  dismissWith(DismissReason.cancel);
};

var handleConfirmWithInput = function handleConfirmWithInput(instance, innerParams) {
  var inputValue = getInputValue(instance, innerParams);

  if (innerParams.inputValidator) {
    instance.disableInput();
    var validationPromise = Promise.resolve().then(function () {
      return innerParams.inputValidator(inputValue, innerParams.validationMessage);
    });
    validationPromise.then(function (validationMessage) {
      instance.enableButtons();
      instance.enableInput();

      if (validationMessage) {
        instance.showValidationMessage(validationMessage);
      } else {
        confirm(instance, innerParams, inputValue);
      }
    });
  } else if (!instance.getInput().checkValidity()) {
    instance.enableButtons();
    instance.showValidationMessage(innerParams.validationMessage);
  } else {
    confirm(instance, innerParams, inputValue);
  }
};

var succeedWith = function succeedWith(instance, value) {
  instance.closePopup({
    value: value
  });
};

var confirm = function confirm(instance, innerParams, value) {
  if (innerParams.showLoaderOnConfirm) {
    showLoading(); // TODO: make showLoading an *instance* method
  }

  if (innerParams.preConfirm) {
    instance.resetValidationMessage();
    var preConfirmPromise = Promise.resolve().then(function () {
      return innerParams.preConfirm(value, innerParams.validationMessage);
    });
    preConfirmPromise.then(function (preConfirmValue) {
      if (isVisible(getValidationMessage()) || preConfirmValue === false) {
        instance.hideLoading();
      } else {
        succeedWith(instance, typeof preConfirmValue === 'undefined' ? value : preConfirmValue);
      }
    });
  } else {
    succeedWith(instance, value);
  }
};

var addKeydownHandler = function addKeydownHandler(instance, globalState, innerParams, dismissWith) {
  if (globalState.keydownTarget && globalState.keydownHandlerAdded) {
    globalState.keydownTarget.removeEventListener('keydown', globalState.keydownHandler, {
      capture: globalState.keydownListenerCapture
    });
    globalState.keydownHandlerAdded = false;
  }

  if (!innerParams.toast) {
    globalState.keydownHandler = function (e) {
      return keydownHandler(instance, e, innerParams, dismissWith);
    };

    globalState.keydownTarget = innerParams.keydownListenerCapture ? window : getPopup();
    globalState.keydownListenerCapture = innerParams.keydownListenerCapture;
    globalState.keydownTarget.addEventListener('keydown', globalState.keydownHandler, {
      capture: globalState.keydownListenerCapture
    });
    globalState.keydownHandlerAdded = true;
  }
}; // Focus handling

var setFocus = function setFocus(innerParams, index, increment) {
  var focusableElements = getFocusableElements(); // search for visible elements and select the next possible match

  for (var i = 0; i < focusableElements.length; i++) {
    index = index + increment; // rollover to first item

    if (index === focusableElements.length) {
      index = 0; // go to last item
    } else if (index === -1) {
      index = focusableElements.length - 1;
    }

    return focusableElements[index].focus();
  } // no visible focusable elements, focus the popup


  getPopup().focus();
};
var arrowKeys = ['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 'Left', 'Right', 'Up', 'Down' // IE11
];
var escKeys = ['Escape', 'Esc' // IE11
];

var keydownHandler = function keydownHandler(instance, e, innerParams, dismissWith) {
  if (innerParams.stopKeydownPropagation) {
    e.stopPropagation();
  } // ENTER


  if (e.key === 'Enter') {
    handleEnter(instance, e, innerParams); // TAB
  } else if (e.key === 'Tab') {
    handleTab(e, innerParams); // ARROWS - switch focus between buttons
  } else if (arrowKeys.indexOf(e.key) !== -1) {
    handleArrows(); // ESC
  } else if (escKeys.indexOf(e.key) !== -1) {
    handleEsc(e, innerParams, dismissWith);
  }
};

var handleEnter = function handleEnter(instance, e, innerParams) {
  // #720 #721
  if (e.isComposing) {
    return;
  }

  if (e.target && instance.getInput() && e.target.outerHTML === instance.getInput().outerHTML) {
    if (['textarea', 'file'].indexOf(innerParams.input) !== -1) {
      return; // do not submit
    }

    clickConfirm();
    e.preventDefault();
  }
};

var handleTab = function handleTab(e, innerParams) {
  var targetElement = e.target;
  var focusableElements = getFocusableElements();
  var btnIndex = -1;

  for (var i = 0; i < focusableElements.length; i++) {
    if (targetElement === focusableElements[i]) {
      btnIndex = i;
      break;
    }
  }

  if (!e.shiftKey) {
    // Cycle to the next button
    setFocus(innerParams, btnIndex, 1);
  } else {
    // Cycle to the prev button
    setFocus(innerParams, btnIndex, -1);
  }

  e.stopPropagation();
  e.preventDefault();
};

var handleArrows = function handleArrows() {
  var confirmButton = getConfirmButton();
  var cancelButton = getCancelButton(); // focus Cancel button if Confirm button is currently focused

  if (document.activeElement === confirmButton && isVisible(cancelButton)) {
    cancelButton.focus(); // and vice versa
  } else if (document.activeElement === cancelButton && isVisible(confirmButton)) {
    confirmButton.focus();
  }
};

var handleEsc = function handleEsc(e, innerParams, dismissWith) {
  if (callIfFunction(innerParams.allowEscapeKey)) {
    e.preventDefault();
    dismissWith(DismissReason.esc);
  }
};

var handlePopupClick = function handlePopupClick(domCache, innerParams, dismissWith) {
  if (innerParams.toast) {
    handleToastClick(domCache, innerParams, dismissWith);
  } else {
    // Ignore click events that had mousedown on the popup but mouseup on the container
    // This can happen when the user drags a slider
    handleModalMousedown(domCache); // Ignore click events that had mousedown on the container but mouseup on the popup

    handleContainerMousedown(domCache);
    handleModalClick(domCache, innerParams, dismissWith);
  }
};

var handleToastClick = function handleToastClick(domCache, innerParams, dismissWith) {
  // Closing toast by internal click
  domCache.popup.onclick = function () {
    if (innerParams.showConfirmButton || innerParams.showCancelButton || innerParams.showCloseButton || innerParams.input) {
      return;
    }

    dismissWith(DismissReason.close);
  };
};

var ignoreOutsideClick = false;

var handleModalMousedown = function handleModalMousedown(domCache) {
  domCache.popup.onmousedown = function () {
    domCache.container.onmouseup = function (e) {
      domCache.container.onmouseup = undefined; // We only check if the mouseup target is the container because usually it doesn't
      // have any other direct children aside of the popup

      if (e.target === domCache.container) {
        ignoreOutsideClick = true;
      }
    };
  };
};

var handleContainerMousedown = function handleContainerMousedown(domCache) {
  domCache.container.onmousedown = function () {
    domCache.popup.onmouseup = function (e) {
      domCache.popup.onmouseup = undefined; // We also need to check if the mouseup target is a child of the popup

      if (e.target === domCache.popup || domCache.popup.contains(e.target)) {
        ignoreOutsideClick = true;
      }
    };
  };
};

var handleModalClick = function handleModalClick(domCache, innerParams, dismissWith) {
  domCache.container.onclick = function (e) {
    if (ignoreOutsideClick) {
      ignoreOutsideClick = false;
      return;
    }

    if (e.target === domCache.container && callIfFunction(innerParams.allowOutsideClick)) {
      dismissWith(DismissReason.backdrop);
    }
  };
};

function _main(userParams) {
  showWarningsForParams(userParams); // Check if there is another Swal closing

  if (getPopup() && globalState.swalCloseEventFinishedCallback) {
    globalState.swalCloseEventFinishedCallback();
    delete globalState.swalCloseEventFinishedCallback;
  } // Check if there is a swal disposal defer timer


  if (globalState.deferDisposalTimer) {
    clearTimeout(globalState.deferDisposalTimer);
    delete globalState.deferDisposalTimer;
  }

  var innerParams = prepareParams(userParams);
  setParameters(innerParams);
  Object.freeze(innerParams); // clear the previous timer

  if (globalState.timeout) {
    globalState.timeout.stop();
    delete globalState.timeout;
  } // clear the restore focus timeout


  clearTimeout(globalState.restoreFocusTimeout);
  var domCache = populateDomCache(this);
  render(this, innerParams);
  privateProps.innerParams.set(this, innerParams);
  return swalPromise(this, domCache, innerParams);
}

var prepareParams = function prepareParams(userParams) {
  var showClass = _extends({}, defaultParams.showClass, userParams.showClass);

  var hideClass = _extends({}, defaultParams.hideClass, userParams.hideClass);

  var params = _extends({}, defaultParams, userParams);

  params.showClass = showClass;
  params.hideClass = hideClass; // @deprecated

  if (userParams.animation === false) {
    params.showClass = {
      popup: '',
      backdrop: 'swal2-backdrop-show swal2-noanimation'
    };
    params.hideClass = {};
  }

  return params;
};

var swalPromise = function swalPromise(instance, domCache, innerParams) {
  return new Promise(function (resolve) {
    // functions to handle all closings/dismissals
    var dismissWith = function dismissWith(dismiss) {
      instance.closePopup({
        dismiss: dismiss
      });
    };

    privateMethods.swalPromiseResolve.set(instance, resolve);
    setupTimer(globalState, innerParams, dismissWith);

    domCache.confirmButton.onclick = function () {
      return handleConfirmButtonClick(instance, innerParams);
    };

    domCache.cancelButton.onclick = function () {
      return handleCancelButtonClick(instance, dismissWith);
    };

    domCache.closeButton.onclick = function () {
      return dismissWith(DismissReason.close);
    };

    handlePopupClick(domCache, innerParams, dismissWith);
    addKeydownHandler(instance, globalState, innerParams, dismissWith);

    if (innerParams.toast && (innerParams.input || innerParams.footer || innerParams.showCloseButton)) {
      addClass(document.body, swalClasses['toast-column']);
    } else {
      removeClass(document.body, swalClasses['toast-column']);
    }

    handleInputOptionsAndValue(instance, innerParams);
    openPopup(innerParams);
    initFocus(domCache, innerParams); // Scroll container to top on open (#1247)

    domCache.container.scrollTop = 0;
  });
};

var populateDomCache = function populateDomCache(instance) {
  var domCache = {
    popup: getPopup(),
    container: getContainer(),
    content: getContent(),
    actions: getActions(),
    confirmButton: getConfirmButton(),
    cancelButton: getCancelButton(),
    closeButton: getCloseButton(),
    validationMessage: getValidationMessage(),
    progressSteps: getProgressSteps()
  };
  privateProps.domCache.set(instance, domCache);
  return domCache;
};

var setupTimer = function setupTimer(globalState$$1, innerParams, dismissWith) {
  var timerProgressBar = getTimerProgressBar();
  hide(timerProgressBar);

  if (innerParams.timer) {
    globalState$$1.timeout = new Timer(function () {
      dismissWith('timer');
      delete globalState$$1.timeout;
    }, innerParams.timer);

    if (innerParams.timerProgressBar) {
      show(timerProgressBar);
      setTimeout(function () {
        animateTimerProgressBar(innerParams.timer);
      });
    }
  }
};

var initFocus = function initFocus(domCache, innerParams) {
  if (innerParams.toast) {
    return;
  }

  if (!callIfFunction(innerParams.allowEnterKey)) {
    return blurActiveElement();
  }

  if (innerParams.focusCancel && isVisible(domCache.cancelButton)) {
    return domCache.cancelButton.focus();
  }

  if (innerParams.focusConfirm && isVisible(domCache.confirmButton)) {
    return domCache.confirmButton.focus();
  }

  setFocus(innerParams, -1, 1);
};

var blurActiveElement = function blurActiveElement() {
  if (document.activeElement && typeof document.activeElement.blur === 'function') {
    document.activeElement.blur();
  }
};

/**
 * Updates popup parameters.
 */

function update(params) {
  var popup = getPopup();
  var innerParams = privateProps.innerParams.get(this);

  if (!popup || hasClass(popup, innerParams.hideClass.popup)) {
    return warn("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
  }

  var validUpdatableParams = {}; // assign valid params from `params` to `defaults`

  Object.keys(params).forEach(function (param) {
    if (Swal.isUpdatableParameter(param)) {
      validUpdatableParams[param] = params[param];
    } else {
      warn("Invalid parameter to update: \"".concat(param, "\". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js"));
    }
  });

  var updatedParams = _extends({}, innerParams, validUpdatableParams);

  render(this, updatedParams);
  privateProps.innerParams.set(this, updatedParams);
  Object.defineProperties(this, {
    params: {
      value: _extends({}, this.params, params),
      writable: false,
      enumerable: true
    }
  });
}



var instanceMethods = Object.freeze({
	hideLoading: hideLoading,
	disableLoading: hideLoading,
	getInput: getInput$1,
	close: close,
	closePopup: close,
	closeModal: close,
	closeToast: close,
	enableButtons: enableButtons,
	disableButtons: disableButtons,
	enableInput: enableInput,
	disableInput: disableInput,
	showValidationMessage: showValidationMessage,
	resetValidationMessage: resetValidationMessage$1,
	getProgressSteps: getProgressSteps$1,
	_main: _main,
	update: update
});

var currentInstance; // SweetAlert constructor

function SweetAlert() {
  // Prevent run in Node env

  /* istanbul ignore if */
  if (typeof window === 'undefined') {
    return;
  } // Check for the existence of Promise

  /* istanbul ignore if */


  if (typeof Promise === 'undefined') {
    error('This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)');
  }

  currentInstance = this;

  for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
    args[_key] = arguments[_key];
  }

  var outerParams = Object.freeze(this.constructor.argsToParams(args));
  Object.defineProperties(this, {
    params: {
      value: outerParams,
      writable: false,
      enumerable: true,
      configurable: true
    }
  });

  var promise = this._main(this.params);

  privateProps.promise.set(this, promise);
} // `catch` cannot be the name of a module export, so we define our thenable methods here instead


SweetAlert.prototype.then = function (onFulfilled) {
  var promise = privateProps.promise.get(this);
  return promise.then(onFulfilled);
};

SweetAlert.prototype["finally"] = function (onFinally) {
  var promise = privateProps.promise.get(this);
  return promise["finally"](onFinally);
}; // Assign instance methods from src/instanceMethods/*.js to prototype


_extends(SweetAlert.prototype, instanceMethods); // Assign static methods from src/staticMethods/*.js to constructor


_extends(SweetAlert, staticMethods); // Proxy to instance methods to constructor, for now, for backwards compatibility


Object.keys(instanceMethods).forEach(function (key) {
  SweetAlert[key] = function () {
    if (currentInstance) {
      var _currentInstance;

      return (_currentInstance = currentInstance)[key].apply(_currentInstance, arguments);
    }
  };
});
SweetAlert.DismissReason = DismissReason;
SweetAlert.version = '9.3.16';

var Swal = SweetAlert;
Swal["default"] = Swal;

return Swal;

})));
if (typeof this !== 'undefined' && this.Sweetalert2){  this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2}
