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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/scripts/pages/ui_toastr.js":
/*!***********************************************!*\
  !*** ./src/assets/scripts/pages/ui_toastr.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var UI_toastr = function () {\n  var toastrNotifications = function toastrNotifications() {\n    var i = -1;\n    var toastCount = 0;\n    var $toastlast;\n\n    var getMessage = function getMessage() {\n      var msg = 'Welcome to siQthemes. Toastr notification sample content.';\n      return msg;\n    };\n\n    $('#showsimple').click(function () {\n      // Display a success toast, with a title\n      toastr.success('Without any options', 'Simple notification!');\n    });\n    $('#showtoast').click(function () {\n      var shortCutFunction = $(\"#toastTypeGroup input:radio:checked\").val();\n      var msg = $('#message').val();\n      var title = $('#title').val() || '';\n      var $showDuration = $('#showDuration');\n      var $hideDuration = $('#hideDuration');\n      var $timeOut = $('#timeOut');\n      var $extendedTimeOut = $('#extendedTimeOut');\n      var $showEasing = $('#showEasing');\n      var $hideEasing = $('#hideEasing');\n      var $showMethod = $('#showMethod');\n      var $hideMethod = $('#hideMethod');\n      var toastIndex = toastCount++;\n      toastr.options = {\n        closeButton: $('#closeButton').prop('checked'),\n        debug: $('#debugInfo').prop('checked'),\n        progressBar: $('#progressBar').prop('checked'),\n        preventDuplicates: $('#preventDuplicates').prop('checked'),\n        positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',\n        onclick: null\n      };\n\n      if ($('#addBehaviorOnToastClick').prop('checked')) {\n        toastr.options.onclick = function () {\n          alert('You can perform some custom action after a toast goes away');\n        };\n      }\n\n      if ($showDuration.val().length) {\n        toastr.options.showDuration = $showDuration.val();\n      }\n\n      if ($hideDuration.val().length) {\n        toastr.options.hideDuration = $hideDuration.val();\n      }\n\n      if ($timeOut.val().length) {\n        toastr.options.timeOut = $timeOut.val();\n      }\n\n      if ($extendedTimeOut.val().length) {\n        toastr.options.extendedTimeOut = $extendedTimeOut.val();\n      }\n\n      if ($showEasing.val().length) {\n        toastr.options.showEasing = $showEasing.val();\n      }\n\n      if ($hideEasing.val().length) {\n        toastr.options.hideEasing = $hideEasing.val();\n      }\n\n      if ($showMethod.val().length) {\n        toastr.options.showMethod = $showMethod.val();\n      }\n\n      if ($hideMethod.val().length) {\n        toastr.options.hideMethod = $hideMethod.val();\n      }\n\n      if (!msg) {\n        msg = getMessage();\n      }\n\n      $(\"#toastrOptions\").text(\"Command: toastr[\" + shortCutFunction + \"](\\\"\" + msg + (title ? \"\\\", \\\"\" + title : '') + \"\\\")\\n\\ntoastr.options = \" + JSON.stringify(toastr.options, null, 2));\n      var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists\n\n      $toastlast = $toast;\n\n      if ($toast.find('#okBtn').length) {\n        $toast.delegate('#okBtn', 'click', function () {\n          alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');\n          $toast.remove();\n        });\n      }\n\n      if ($toast.find('#surpriseBtn').length) {\n        $toast.delegate('#surpriseBtn', 'click', function () {\n          alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');\n        });\n      }\n    });\n\n    function getLastToast() {\n      return $toastlast;\n    }\n\n    $('#clearlasttoast').click(function () {\n      toastr.clear(getLastToast());\n    });\n    $('#cleartoasts').click(function () {\n      toastr.clear();\n    });\n  };\n\n  return {\n    init: function init() {\n      toastrNotifications();\n    }\n  };\n}();\n\n$(function () {\n  UI_toastr.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvYXNzZXRzL3NjcmlwdHMvcGFnZXMvdWlfdG9hc3RyLmpzPzVkMzEiXSwibmFtZXMiOlsiVUlfdG9hc3RyIiwidG9hc3RyTm90aWZpY2F0aW9ucyIsImkiLCJ0b2FzdENvdW50IiwiJHRvYXN0bGFzdCIsImdldE1lc3NhZ2UiLCJtc2ciLCIkIiwiY2xpY2siLCJ0b2FzdHIiLCJzdWNjZXNzIiwic2hvcnRDdXRGdW5jdGlvbiIsInZhbCIsInRpdGxlIiwiJHNob3dEdXJhdGlvbiIsIiRoaWRlRHVyYXRpb24iLCIkdGltZU91dCIsIiRleHRlbmRlZFRpbWVPdXQiLCIkc2hvd0Vhc2luZyIsIiRoaWRlRWFzaW5nIiwiJHNob3dNZXRob2QiLCIkaGlkZU1ldGhvZCIsInRvYXN0SW5kZXgiLCJvcHRpb25zIiwiY2xvc2VCdXR0b24iLCJwcm9wIiwiZGVidWciLCJwcm9ncmVzc0JhciIsInByZXZlbnREdXBsaWNhdGVzIiwicG9zaXRpb25DbGFzcyIsIm9uY2xpY2siLCJhbGVydCIsImxlbmd0aCIsInNob3dEdXJhdGlvbiIsImhpZGVEdXJhdGlvbiIsInRpbWVPdXQiLCJleHRlbmRlZFRpbWVPdXQiLCJzaG93RWFzaW5nIiwiaGlkZUVhc2luZyIsInNob3dNZXRob2QiLCJoaWRlTWV0aG9kIiwidGV4dCIsIkpTT04iLCJzdHJpbmdpZnkiLCIkdG9hc3QiLCJmaW5kIiwiZGVsZWdhdGUiLCJyZW1vdmUiLCJnZXRMYXN0VG9hc3QiLCJjbGVhciIsImluaXQiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLFNBQVMsR0FBRyxZQUFXO0FBRXZCLE1BQUlDLG1CQUFtQixHQUFHLFNBQXRCQSxtQkFBc0IsR0FBVztBQUNqQyxRQUFJQyxDQUFDLEdBQUcsQ0FBQyxDQUFUO0FBQ0EsUUFBSUMsVUFBVSxHQUFHLENBQWpCO0FBQ0EsUUFBSUMsVUFBSjs7QUFDQSxRQUFJQyxVQUFVLEdBQUcsU0FBYkEsVUFBYSxHQUFZO0FBQ3pCLFVBQUlDLEdBQUcs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QyxJQUFQLENBQVksUUFBWixFQUFzQmIsTUFBMUIsRUFBa0M7QUFDOUJZLGNBQU0sQ0FBQ0UsUUFBUCxDQUFnQixRQUFoQixFQUEwQixPQUExQixFQUFtQyxZQUFZO0FBQzNDZixlQUFLLENBQUMsa0NBQWtDVCxVQUFsQyxHQUErQyxZQUFoRCxDQUFMO0FBQ0FzQixnQkFBTSxDQUFDRyxNQUFQO0FBQ0gsU0FIRDtBQUlIOztBQUNELFVBQUlILE1BQU0sQ0FBQ0MsSUFBUCxDQUFZLGNBQVosRUFBNEJiLE1BQWhDLEVBQXdDO0FBQ3BDWSxjQUFNLENBQUNFLFFBQVAsQ0FBZ0IsY0FBaEIsRUFBZ0MsT0FBaEMsRUFBeUMsWUFBWTtBQUNqRGYsZUFBSyxDQUFDLDRDQUE0Q1QsVUFBNUMsR0FBeUQscUNBQTFELENBQUw7QUFDSCxTQUZEO0FBR0g7QUFDSixLQTFFRDs7QUEyRUEsYUFBUzBCLFlBQVQsR0FBd0I7QUFDcEIsYUFBTzVDLFVBQVA7QUFDSDs7QUFDREcsS0FBQyxDQUFDLGlCQUFELENBQUQsQ0FBcUJDLEtBQXJCLENBQTJCLFlBQVk7QUFDbkNDLFlBQU0sQ0FBQ3dDLEtBQVAsQ0FBYUQsWUFBWSxFQUF6QjtBQUNILEtBRkQ7QUFHQXpDLEtBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JDLEtBQWxCLENBQXdCLFlBQVk7QUFDaENDLFlBQU0sQ0FBQ3dDLEtBQVA7QUFDSCxLQUZEO0FBR0gsR0FqR0Q7O0FBbUdBLFNBQU87QUFDSEMsUUFBSSxFQUFFLGdCQUFZO0FBQ2RqRCx5QkFBbUI7QUFDdEI7QUFIRSxHQUFQO0FBTUgsQ0EzR2UsRUFBaEI7O0FBNkdBTSxDQUFDLENBQUMsWUFBWTtBQUNWUCxXQUFTLENBQUNrRCxJQUFWO0FBQ0gsQ0FGQSxDQUFEIiwiZmlsZSI6Ii4vc3JjL2Fzc2V0cy9zY3JpcHRzL3BhZ2VzL3VpX3RvYXN0ci5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBVSV90b2FzdHIgPSBmdW5jdGlvbigpIHtcblxuICAgIHZhciB0b2FzdHJOb3RpZmljYXRpb25zID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciBpID0gLTE7XG4gICAgICAgIHZhciB0b2FzdENvdW50ID0gMDtcbiAgICAgICAgdmFyICR0b2FzdGxhc3Q7XG4gICAgICAgIHZhciBnZXRNZXNzYWdlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgdmFyIG1zZyA9ICdXZWxjb21lIHRvIHNpUXRoZW1lcy4gVG9hc3RyIG5vdGlmaWNhdGlvbiBzYW1wbGUgY29udGVudC4nO1xuICAgICAgICAgICAgcmV0dXJuIG1zZztcbiAgICAgICAgfTtcblxuICAgICAgICAkKCcjc2hvd3NpbXBsZScpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIC8vIERpc3BsYXkgYSBzdWNjZXNzIHRvYXN0LCB3aXRoIGEgdGl0bGVcbiAgICAgICAgICAgIHRvYXN0ci5zdWNjZXNzKCdXaXRob3V0IGFueSBvcHRpb25zJywgJ1NpbXBsZSBub3RpZmljYXRpb24hJylcbiAgICAgICAgfSk7XG4gICAgICAgICQoJyNzaG93dG9hc3QnKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB2YXIgc2hvcnRDdXRGdW5jdGlvbiA9ICQoXCIjdG9hc3RUeXBlR3JvdXAgaW5wdXQ6cmFkaW86Y2hlY2tlZFwiKS52YWwoKTtcbiAgICAgICAgICAgIHZhciBtc2cgPSAkKCcjbWVzc2FnZScpLnZhbCgpO1xuICAgICAgICAgICAgdmFyIHRpdGxlID0gJCgnI3RpdGxlJykudmFsKCkgfHwgJyc7XG4gICAgICAgICAgICB2YXIgJHNob3dEdXJhdGlvbiA9ICQoJyNzaG93RHVyYXRpb24nKTtcbiAgICAgICAgICAgIHZhciAkaGlkZUR1cmF0aW9uID0gJCgnI2hpZGVEdXJhdGlvbicpO1xuICAgICAgICAgICAgdmFyICR0aW1lT3V0ID0gJCgnI3RpbWVPdXQnKTtcbiAgICAgICAgICAgIHZhciAkZXh0ZW5kZWRUaW1lT3V0ID0gJCgnI2V4dGVuZGVkVGltZU91dCcpO1xuICAgICAgICAgICAgdmFyICRzaG93RWFzaW5nID0gJCgnI3Nob3dFYXNpbmcnKTtcbiAgICAgICAgICAgIHZhciAkaGlkZUVhc2luZyA9ICQoJyNoaWRlRWFzaW5nJyk7XG4gICAgICAgICAgICB2YXIgJHNob3dNZXRob2QgPSAkKCcjc2hvd01ldGhvZCcpO1xuICAgICAgICAgICAgdmFyICRoaWRlTWV0aG9kID0gJCgnI2hpZGVNZXRob2QnKTtcbiAgICAgICAgICAgIHZhciB0b2FzdEluZGV4ID0gdG9hc3RDb3VudCsrO1xuICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMgPSB7XG4gICAgICAgICAgICAgICAgY2xvc2VCdXR0b246ICQoJyNjbG9zZUJ1dHRvbicpLnByb3AoJ2NoZWNrZWQnKSxcbiAgICAgICAgICAgICAgICBkZWJ1ZzogJCgnI2RlYnVnSW5mbycpLnByb3AoJ2NoZWNrZWQnKSxcbiAgICAgICAgICAgICAgICBwcm9ncmVzc0JhcjogJCgnI3Byb2dyZXNzQmFyJykucHJvcCgnY2hlY2tlZCcpLFxuICAgICAgICAgICAgICAgIHByZXZlbnREdXBsaWNhdGVzOiAkKCcjcHJldmVudER1cGxpY2F0ZXMnKS5wcm9wKCdjaGVja2VkJyksXG4gICAgICAgICAgICAgICAgcG9zaXRpb25DbGFzczogJCgnI3Bvc2l0aW9uR3JvdXAgaW5wdXQ6cmFkaW86Y2hlY2tlZCcpLnZhbCgpIHx8ICd0b2FzdC10b3AtcmlnaHQnLFxuICAgICAgICAgICAgICAgIG9uY2xpY2s6IG51bGxcbiAgICAgICAgICAgIH07XG4gICAgICAgICAgICBpZiAoJCgnI2FkZEJlaGF2aW9yT25Ub2FzdENsaWNrJykucHJvcCgnY2hlY2tlZCcpKSB7XG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMub25jbGljayA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgYWxlcnQoJ1lvdSBjYW4gcGVyZm9ybSBzb21lIGN1c3RvbSBhY3Rpb24gYWZ0ZXIgYSB0b2FzdCBnb2VzIGF3YXknKTtcbiAgICAgICAgICAgICAgICB9O1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgaWYgKCRzaG93RHVyYXRpb24udmFsKCkubGVuZ3RoKSB7XG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuc2hvd0R1cmF0aW9uID0gJHNob3dEdXJhdGlvbi52YWwoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmICgkaGlkZUR1cmF0aW9uLnZhbCgpLmxlbmd0aCkge1xuICAgICAgICAgICAgICAgIHRvYXN0ci5vcHRpb25zLmhpZGVEdXJhdGlvbiA9ICRoaWRlRHVyYXRpb24udmFsKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAoJHRpbWVPdXQudmFsKCkubGVuZ3RoKSB7XG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMudGltZU91dCA9ICR0aW1lT3V0LnZhbCgpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgaWYgKCRleHRlbmRlZFRpbWVPdXQudmFsKCkubGVuZ3RoKSB7XG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuZXh0ZW5kZWRUaW1lT3V0ID0gJGV4dGVuZGVkVGltZU91dC52YWwoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmICgkc2hvd0Vhc2luZy52YWwoKS5sZW5ndGgpIHtcbiAgICAgICAgICAgICAgICB0b2FzdHIub3B0aW9ucy5zaG93RWFzaW5nID0gJHNob3dFYXNpbmcudmFsKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAoJGhpZGVFYXNpbmcudmFsKCkubGVuZ3RoKSB7XG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuaGlkZUVhc2luZyA9ICRoaWRlRWFzaW5nLnZhbCgpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgaWYgKCRzaG93TWV0aG9kLnZhbCgpLmxlbmd0aCkge1xuICAgICAgICAgICAgICAgIHRvYXN0ci5vcHRpb25zLnNob3dNZXRob2QgPSAkc2hvd01ldGhvZC52YWwoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmICgkaGlkZU1ldGhvZC52YWwoKS5sZW5ndGgpIHtcbiAgICAgICAgICAgICAgICB0b2FzdHIub3B0aW9ucy5oaWRlTWV0aG9kID0gJGhpZGVNZXRob2QudmFsKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAoIW1zZykge1xuICAgICAgICAgICAgICAgIG1zZyA9IGdldE1lc3NhZ2UoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgICQoXCIjdG9hc3RyT3B0aW9uc1wiKS50ZXh0KFwiQ29tbWFuZDogdG9hc3RyW1wiXG4gICAgICAgICAgICAgICAgKyBzaG9ydEN1dEZ1bmN0aW9uXG4gICAgICAgICAgICAgICAgKyBcIl0oXFxcIlwiXG4gICAgICAgICAgICAgICAgKyBtc2dcbiAgICAgICAgICAgICAgICArICh0aXRsZSA/IFwiXFxcIiwgXFxcIlwiICsgdGl0bGUgOiAnJylcbiAgICAgICAgICAgICAgICArIFwiXFxcIilcXG5cXG50b2FzdHIub3B0aW9ucyA9IFwiXG4gICAgICAgICAgICAgICAgKyBKU09OLnN0cmluZ2lmeSh0b2FzdHIub3B0aW9ucywgbnVsbCwgMilcbiAgICAgICAgICAgICk7XG4gICAgICAgICAgICB2YXIgJHRvYXN0ID0gdG9hc3RyW3Nob3J0Q3V0RnVuY3Rpb25dKG1zZywgdGl0bGUpOyAvLyBXaXJlIHVwIGFuIGV2ZW50IGhhbmRsZXIgdG8gYSBidXR0b24gaW4gdGhlIHRvYXN0LCBpZiBpdCBleGlzdHNcbiAgICAgICAgICAgICR0b2FzdGxhc3QgPSAkdG9hc3Q7XG4gICAgICAgICAgICBpZiAoJHRvYXN0LmZpbmQoJyNva0J0bicpLmxlbmd0aCkge1xuICAgICAgICAgICAgICAgICR0b2FzdC5kZWxlZ2F0ZSgnI29rQnRuJywgJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBhbGVydCgneW91IGNsaWNrZWQgbWUuIGkgd2FzIHRvYXN0ICMnICsgdG9hc3RJbmRleCArICcuIGdvb2RieWUhJyk7XG4gICAgICAgICAgICAgICAgICAgICR0b2FzdC5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmICgkdG9hc3QuZmluZCgnI3N1cnByaXNlQnRuJykubGVuZ3RoKSB7XG4gICAgICAgICAgICAgICAgJHRvYXN0LmRlbGVnYXRlKCcjc3VycHJpc2VCdG4nLCAnY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIGFsZXJ0KCdTdXJwcmlzZSEgeW91IGNsaWNrZWQgbWUuIGkgd2FzIHRvYXN0ICMnICsgdG9hc3RJbmRleCArICcuIFlvdSBjb3VsZCBwZXJmb3JtIGFuIGFjdGlvbiBoZXJlLicpO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgICAgZnVuY3Rpb24gZ2V0TGFzdFRvYXN0KCkge1xuICAgICAgICAgICAgcmV0dXJuICR0b2FzdGxhc3Q7XG4gICAgICAgIH1cbiAgICAgICAgJCgnI2NsZWFybGFzdHRvYXN0JykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgdG9hc3RyLmNsZWFyKGdldExhc3RUb2FzdCgpKTtcbiAgICAgICAgfSk7XG4gICAgICAgICQoJyNjbGVhcnRvYXN0cycpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIHRvYXN0ci5jbGVhcigpO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICByZXR1cm4ge1xuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB0b2FzdHJOb3RpZmljYXRpb25zKCk7XG4gICAgICAgIH1cbiAgICB9O1xuXG59KCk7XG5cbiQoZnVuY3Rpb24gKCkge1xuICAgIFVJX3RvYXN0ci5pbml0KCk7XG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/assets/scripts/pages/ui_toastr.js\n");

/***/ }),

/***/ 3:
/*!*****************************************************!*\
  !*** multi ./src/assets/scripts/pages/ui_toastr.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/simonnguyen/GIT/siqtheme/src/assets/scripts/pages/ui_toastr.js */"./src/assets/scripts/pages/ui_toastr.js");


/***/ })

/******/ });