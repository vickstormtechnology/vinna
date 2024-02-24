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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/scripts/pages/ui_modal.js":
/*!**********************************************!*\
  !*** ./src/assets/scripts/pages/ui_modal.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var UI_modals = function () {\n  var handleModalColor = function handleModalColor() {\n    $('body').on('click', '.exampleColorModal', function () {\n      color = $(this).attr('data-color');\n      $('#exampleColorModal').modal();\n    });\n    $('#exampleColorModal').on('show.bs.modal', function () {\n      $(this).addClass('modal-' + color);\n      $(this).find('.modal-title').text(color[0].toUpperCase() + color.substring(1) + ' Modal');\n    });\n    $('#exampleColorModal').on('hidden.bs.modal', function () {\n      $(this).removeClass('modal-' + color);\n      $(this).find('.modal-title').text('Colored Modal');\n    });\n  };\n\n  var handleModalSizes = function handleModalSizes() {\n    $('body').on('click', '.exampleModalSize', function () {\n      size = $(this).attr('data-size');\n      $('#exampleModalSize').modal();\n    });\n    $('#exampleModalSize').on('show.bs.modal', function () {\n      $(this).find('.modal-dialog').addClass('modal-' + size);\n    });\n    $('#exampleModalSize').on('hidden.bs.modal', function () {\n      $(this).find('.modal-dialog').removeClass('modal-' + size);\n    });\n  };\n\n  var handleVaryingModal = function handleVaryingModal() {\n    $('#exampleVarying').on('show.bs.modal', function (e) {\n      var button = $(e.relatedTarget);\n      var recipient = button.data('recipient');\n      var modal = $(this);\n      modal.find('.modal-title').text('New message to ' + recipient);\n      modal.find('.modal-body input').val(recipient);\n    });\n  };\n\n  return {\n    init: function init() {\n      handleModalColor();\n      handleModalSizes();\n      handleVaryingModal();\n    }\n  };\n}();\n\n$(function () {\n  UI_modals.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvYXNzZXRzL3NjcmlwdHMvcGFnZXMvdWlfbW9kYWwuanM/MTY3ZCJdLCJuYW1lcyI6WyJVSV9tb2RhbHMiLCJoYW5kbGVNb2RhbENvbG9yIiwiJCIsIm9uIiwiY29sb3IiLCJhdHRyIiwibW9kYWwiLCJhZGRDbGFzcyIsImZpbmQiLCJ0ZXh0IiwidG9VcHBlckNhc2UiLCJzdWJzdHJpbmciLCJyZW1vdmVDbGFzcyIsImhhbmRsZU1vZGFsU2l6ZXMiLCJzaXplIiwiaGFuZGxlVmFyeWluZ01vZGFsIiwiZSIsImJ1dHRvbiIsInJlbGF0ZWRUYXJnZXQiLCJyZWNpcGllbnQiLCJkYXRhIiwidmFsIiwiaW5pdCJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsU0FBUyxHQUFHLFlBQVk7QUFFeEIsTUFBSUMsZ0JBQWdCLEdBQUcsU0FBbkJBLGdCQUFtQixHQUFZO0FBQy9CQyxLQUFDLENBQUMsTUFBRCxDQUFELENBQVVDLEVBQVYsQ0FBYSxPQUFiLEVBQXNCLG9CQUF0QixFQUE0QyxZQUFZO0FBQ3BEQyxXQUFLLEdBQUdGLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLFlBQWIsQ0FBUjtBQUVBSCxPQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkksS0FBeEI7QUFDSCxLQUpEO0FBTUFKLEtBQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCQyxFQUF4QixDQUEyQixlQUEzQixFQUE0QyxZQUFZO0FBQ3BERCxPQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLFFBQVIsQ0FBaUIsV0FBV0gsS0FBNUI7QUFDQUYsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTSxJQUFSLENBQWEsY0FBYixFQUE2QkMsSUFBN0IsQ0FBa0NMLEtBQUssQ0FBQyxDQUFELENBQUwsQ0FBU00sV0FBVCxLQUF5Qk4sS0FBSyxDQUFDTyxTQUFOLENBQWdCLENBQWhCLENBQXpCLEdBQThDLFFBQWhGO0FBQ0gsS0FIRDtBQUtBVCxLQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkMsRUFBeEIsQ0FBMkIsaUJBQTNCLEVBQThDLFlBQVk7QUFDdERELE9BQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVUsV0FBUixDQUFvQixXQUFXUixLQUEvQjtBQUNBRixPQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxjQUFiLEVBQTZCQyxJQUE3QixDQUFrQyxlQUFsQztBQUNILEtBSEQ7QUFJSCxHQWhCRDs7QUFrQkEsTUFBSUksZ0JBQWdCLEdBQUcsU0FBbkJBLGdCQUFtQixHQUFZO0FBQy9CWCxLQUFDLENBQUMsTUFBRCxDQUFELENBQVVDLEVBQVYsQ0FBYSxPQUFiLEVBQXNCLG1CQUF0QixFQUEyQyxZQUFZO0FBQ25EVyxVQUFJLEdBQUdaLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLFdBQWIsQ0FBUDtBQUVBSCxPQUFDLENBQUMsbUJBQUQsQ0FBRCxDQUF1QkksS0FBdkI7QUFDSCxLQUpEO0FBTUFKLEtBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCQyxFQUF2QixDQUEwQixlQUExQixFQUEyQyxZQUFZO0FBQ25ERCxPQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxlQUFiLEVBQThCRCxRQUE5QixDQUF1QyxXQUFXTyxJQUFsRDtBQUNILEtBRkQ7QUFJQVosS0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJDLEVBQXZCLENBQTBCLGlCQUExQixFQUE2QyxZQUFZO0FBQ3JERCxPQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxlQUFiLEVBQThCSSxXQUE5QixDQUEwQyxXQUFXRSxJQUFyRDtBQUNILEtBRkQ7QUFHSCxHQWREOztBQWdCQSxNQUFJQyxrQkFBa0IsR0FBRyxTQUFyQkEsa0JBQXFCLEdBQVk7QUFDakNiLEtBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCQyxFQUFyQixDQUF3QixlQUF4QixFQUF5QyxVQUFVYSxDQUFWLEVBQWE7QUFDbEQsVUFBSUMsTUFBTSxHQUFHZixDQUFDLENBQUNjLENBQUMsQ0FBQ0UsYUFBSCxDQUFkO0FBQ0EsVUFBSUMsU0FBUyxHQUFHRixNQUFNLENBQUNHLElBQVAsQ0FBWSxXQUFaLENBQWhCO0FBQ0EsVUFBSWQsS0FBSyxHQUFHSixDQUFDLENBQUMsSUFBRCxDQUFiO0FBRUFJLFdBQUssQ0FBQ0UsSUFBTixDQUFXLGNBQVgsRUFBMkJDLElBQTNCLENBQWdDLG9CQUFvQlUsU0FBcEQ7QUFDQWIsV0FBSyxDQUFDRSxJQUFOLENBQVcsbUJBQVgsRUFBZ0NhLEdBQWhDLENBQW9DRixTQUFwQztBQUNILEtBUEQ7QUFRSCxHQVREOztBQVdBLFNBQU87QUFDSEcsUUFBSSxFQUFFLGdCQUFZO0FBRWRyQixzQkFBZ0I7QUFDaEJZLHNCQUFnQjtBQUNoQkUsd0JBQWtCO0FBQ3JCO0FBTkUsR0FBUDtBQVNILENBeERlLEVBQWhCOztBQTBEQWIsQ0FBQyxDQUFDLFlBQVk7QUFDVkYsV0FBUyxDQUFDc0IsSUFBVjtBQUNILENBRkEsQ0FBRCIsImZpbGUiOiIuL3NyYy9hc3NldHMvc2NyaXB0cy9wYWdlcy91aV9tb2RhbC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBVSV9tb2RhbHMgPSBmdW5jdGlvbiAoKSB7XG5cbiAgICB2YXIgaGFuZGxlTW9kYWxDb2xvciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCgnYm9keScpLm9uKCdjbGljaycsICcuZXhhbXBsZUNvbG9yTW9kYWwnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBjb2xvciA9ICQodGhpcykuYXR0cignZGF0YS1jb2xvcicpO1xuXG4gICAgICAgICAgICAkKCcjZXhhbXBsZUNvbG9yTW9kYWwnKS5tb2RhbCgpO1xuICAgICAgICB9KTtcblxuICAgICAgICAkKCcjZXhhbXBsZUNvbG9yTW9kYWwnKS5vbignc2hvdy5icy5tb2RhbCcsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ21vZGFsLScgKyBjb2xvcik7XG4gICAgICAgICAgICAkKHRoaXMpLmZpbmQoJy5tb2RhbC10aXRsZScpLnRleHQoY29sb3JbMF0udG9VcHBlckNhc2UoKSArIGNvbG9yLnN1YnN0cmluZygxKSArICcgTW9kYWwnKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgJCgnI2V4YW1wbGVDb2xvck1vZGFsJykub24oJ2hpZGRlbi5icy5tb2RhbCcsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICQodGhpcykucmVtb3ZlQ2xhc3MoJ21vZGFsLScgKyBjb2xvcik7XG4gICAgICAgICAgICAkKHRoaXMpLmZpbmQoJy5tb2RhbC10aXRsZScpLnRleHQoJ0NvbG9yZWQgTW9kYWwnKTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgdmFyIGhhbmRsZU1vZGFsU2l6ZXMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICQoJ2JvZHknKS5vbignY2xpY2snLCAnLmV4YW1wbGVNb2RhbFNpemUnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBzaXplID0gJCh0aGlzKS5hdHRyKCdkYXRhLXNpemUnKTtcblxuICAgICAgICAgICAgJCgnI2V4YW1wbGVNb2RhbFNpemUnKS5tb2RhbCgpO1xuICAgICAgICB9KTtcblxuICAgICAgICAkKCcjZXhhbXBsZU1vZGFsU2l6ZScpLm9uKCdzaG93LmJzLm1vZGFsJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5maW5kKCcubW9kYWwtZGlhbG9nJykuYWRkQ2xhc3MoJ21vZGFsLScgKyBzaXplKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgJCgnI2V4YW1wbGVNb2RhbFNpemUnKS5vbignaGlkZGVuLmJzLm1vZGFsJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5maW5kKCcubW9kYWwtZGlhbG9nJykucmVtb3ZlQ2xhc3MoJ21vZGFsLScgKyBzaXplKTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgdmFyIGhhbmRsZVZhcnlpbmdNb2RhbCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCgnI2V4YW1wbGVWYXJ5aW5nJykub24oJ3Nob3cuYnMubW9kYWwnLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgdmFyIGJ1dHRvbiA9ICQoZS5yZWxhdGVkVGFyZ2V0KTtcbiAgICAgICAgICAgIHZhciByZWNpcGllbnQgPSBidXR0b24uZGF0YSgncmVjaXBpZW50Jyk7XG4gICAgICAgICAgICB2YXIgbW9kYWwgPSAkKHRoaXMpO1xuXG4gICAgICAgICAgICBtb2RhbC5maW5kKCcubW9kYWwtdGl0bGUnKS50ZXh0KCdOZXcgbWVzc2FnZSB0byAnICsgcmVjaXBpZW50KTtcbiAgICAgICAgICAgIG1vZGFsLmZpbmQoJy5tb2RhbC1ib2R5IGlucHV0JykudmFsKHJlY2lwaWVudCk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHJldHVybiB7XG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcblxuICAgICAgICAgICAgaGFuZGxlTW9kYWxDb2xvcigpO1xuICAgICAgICAgICAgaGFuZGxlTW9kYWxTaXplcygpO1xuICAgICAgICAgICAgaGFuZGxlVmFyeWluZ01vZGFsKCk7XG4gICAgICAgIH1cbiAgICB9O1xuXG59KCk7XG5cbiQoZnVuY3Rpb24gKCkge1xuICAgIFVJX21vZGFscy5pbml0KCk7XG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/assets/scripts/pages/ui_modal.js\n");

/***/ }),

/***/ 2:
/*!****************************************************!*\
  !*** multi ./src/assets/scripts/pages/ui_modal.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/simonnguyen/GIT/siqtheme/src/assets/scripts/pages/ui_modal.js */"./src/assets/scripts/pages/ui_modal.js");


/***/ })

/******/ });