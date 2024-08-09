"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
self["webpackHotUpdateqaiser_theme"]("main",{

/***/ "./src/modules/like.js":
/*!*****************************!*\
  !*** ./src/modules/like.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"./node_modules/jquery/dist/jquery.js\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\nfunction _typeof(o) { \"@babel/helpers - typeof\"; return _typeof = \"function\" == typeof Symbol && \"symbol\" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && \"function\" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? \"symbol\" : typeof o; }, _typeof(o); }\nfunction _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError(\"Cannot call a class as a function\"); }\nfunction _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, \"value\" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }\nfunction _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, \"prototype\", { writable: !1 }), e; }\nfunction _toPropertyKey(t) { var i = _toPrimitive(t, \"string\"); return \"symbol\" == _typeof(i) ? i : i + \"\"; }\nfunction _toPrimitive(t, r) { if (\"object\" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || \"default\"); if (\"object\" != _typeof(i)) return i; throw new TypeError(\"@@toPrimitive must return a primitive value.\"); } return (\"string\" === r ? String : Number)(t); }\n\nvar Like = /*#__PURE__*/function () {\n  function Like() {\n    _classCallCheck(this, Like);\n    this.events();\n  }\n  return _createClass(Like, [{\n    key: \"events\",\n    value: function events() {\n      jquery__WEBPACK_IMPORTED_MODULE_0___default()(\".like-box\").on(\"click\", this.ourClickDispatcher.bind(this));\n    }\n\n    // methods\n  }, {\n    key: \"ourClickDispatcher\",\n    value: function ourClickDispatcher(e) {\n      var currentLikeBox = jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).closest(\".like-box\");\n      if (currentLikeBox.attr(\"data-exists\") == \"yes\") {\n        this.deleteLike(currentLikeBox);\n      } else {\n        this.createLike(currentLikeBox);\n      }\n    }\n  }, {\n    key: \"createLike\",\n    value: function createLike(currentLikeBox) {\n      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({\n        beforeSend: function beforeSend(xhr) {\n          xhr.setRequestHeader(\"X-WP-Nonce\", universityData.nonce);\n        },\n        url: universityData.root_url + \"/wp-json/university/v1/manageLike\",\n        type: \"POST\",\n        data: {\n          \"professorId\": currentLikeBox.data(\"professor\")\n        },\n        success: function success(response) {\n          currentLikeBox.attr(\"data-exists\", \"yes\");\n          var likeCount = parseInt(currentLikeBox.find(\".like-count\").html(), 10);\n          likeCount++;\n          currentLikeBox.find(\".like-count\").html(likeCount);\n          currentLikeBox.attr(\"data-like\", response);\n          console.log(response);\n        },\n        error: function error(response) {\n          console.log(response);\n        }\n      });\n    }\n  }, {\n    key: \"deleteLike\",\n    value: function deleteLike(currentLikeBox) {\n      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({\n        beforeSend: function beforeSend(xhr) {\n          xhr.setRequestHeader(\"X-WP-Nonce\", universityData.nonce);\n        },\n        url: universityData.root_url + \"/wp-json/university/v1/manageLike\",\n        data: {\n          \"like\": currentLikeBox.attr(\"data-like\")\n        },\n        type: \"DELETE\",\n        success: function success(response) {\n          currentLikeBox.attr(\"data-exists\", \"no\");\n          var likeCount = parseInt(currentLikeBox.find(\".like-count\").html(), 10);\n          likeCount--;\n          currentLikeBox.find(\".like-count\").html(likeCount);\n          currentLikeBox.attr(\"data-like\", \"\");\n          console.log(response);\n        },\n        error: function error(response) {\n          console.log(response);\n        }\n      });\n    }\n  }]);\n}();\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Like);\n\n//# sourceURL=webpack://qaiser-theme/./src/modules/like.js?");

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("d1481ead5fc3d210c6ad")
/******/ })();
/******/ 
/******/ }
);