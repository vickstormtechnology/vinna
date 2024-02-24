/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/scripts/pages/pg_login.js":
/*!**********************************************!*\
  !*** ./src/assets/scripts/pages/pg_login.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var Login = function () {\n  var handleLogin = function handleLogin() {\n    $('#forget-password').click(function () {\n      $('#login-card').hide();\n      $('#forget-card').show();\n    });\n    $('#forget-cancel').click(function () {\n      $('#login-card').show();\n      $('#forget-card').hide();\n    });\n  };\n\n  return {\n    init: function init() {\n      // hide password forgotton form\n      $('#forget-card').hide();\n      handleLogin();\n    }\n  };\n}();\n\n$(function () {\n  Login.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvYXNzZXRzL3NjcmlwdHMvcGFnZXMvcGdfbG9naW4uanM/NjlmZCJdLCJuYW1lcyI6WyJMb2dpbiIsImhhbmRsZUxvZ2luIiwiJCIsImNsaWNrIiwiaGlkZSIsInNob3ciLCJpbml0Il0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxLQUFLLEdBQUcsWUFBWTtBQUVwQixNQUFJQyxXQUFXLEdBQUcsU0FBZEEsV0FBYyxHQUFZO0FBQzFCQyxLQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQkMsS0FBdEIsQ0FBNEIsWUFBWTtBQUNwQ0QsT0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkUsSUFBakI7QUFDQUYsT0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkcsSUFBbEI7QUFDSCxLQUhEO0FBS0FILEtBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CQyxLQUFwQixDQUEwQixZQUFZO0FBQ2xDRCxPQUFDLENBQUMsYUFBRCxDQUFELENBQWlCRyxJQUFqQjtBQUNBSCxPQUFDLENBQUMsY0FBRCxDQUFELENBQWtCRSxJQUFsQjtBQUNILEtBSEQ7QUFJSCxHQVZEOztBQVlBLFNBQU87QUFDSEUsUUFBSSxFQUFFLGdCQUFZO0FBRWQ7QUFDQUosT0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkUsSUFBbEI7QUFFQUgsaUJBQVc7QUFDZDtBQVBFLEdBQVA7QUFVSCxDQXhCVyxFQUFaOztBQTBCQUMsQ0FBQyxDQUFDLFlBQVk7QUFDVkYsT0FBSyxDQUFDTSxJQUFOO0FBQ0gsQ0FGQSxDQUFEIiwiZmlsZSI6Ii4vc3JjL2Fzc2V0cy9zY3JpcHRzL3BhZ2VzL3BnX2xvZ2luLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIExvZ2luID0gZnVuY3Rpb24gKCkge1xuXG4gICAgdmFyIGhhbmRsZUxvZ2luID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAkKCcjZm9yZ2V0LXBhc3N3b3JkJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJCgnI2xvZ2luLWNhcmQnKS5oaWRlKCk7XG4gICAgICAgICAgICAkKCcjZm9yZ2V0LWNhcmQnKS5zaG93KCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgICQoJyNmb3JnZXQtY2FuY2VsJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJCgnI2xvZ2luLWNhcmQnKS5zaG93KCk7XG4gICAgICAgICAgICAkKCcjZm9yZ2V0LWNhcmQnKS5oaWRlKCk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHJldHVybiB7XG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcblxuICAgICAgICAgICAgLy8gaGlkZSBwYXNzd29yZCBmb3Jnb3R0b24gZm9ybVxuICAgICAgICAgICAgJCgnI2ZvcmdldC1jYXJkJykuaGlkZSgpO1xuXG4gICAgICAgICAgICBoYW5kbGVMb2dpbigpO1xuICAgICAgICB9XG4gICAgfTtcblxufSgpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICBMb2dpbi5pbml0KCk7XG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/assets/scripts/pages/pg_login.js\n");

/***/ }),

/***/ 7:
/*!****************************************************!*\
  !*** multi ./src/assets/scripts/pages/pg_login.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/simonnguyen/GIT/siqtheme/src/assets/scripts/pages/pg_login.js */"./src/assets/scripts/pages/pg_login.js");


/***/ })

/******/ });