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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*

=========================================================
* Volt - Bootstrap 5 Admin Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

*/


var d = document;
d.addEventListener("DOMContentLoaded", function (event) {
  // options
  var breakpoints = {
    sm: 540,
    md: 720,
    lg: 960,
    xl: 1140
  };
  var preloader = d.querySelector('.preloader');

  if (preloader) {
    setTimeout(function () {
      preloader.classList.add('show');
      setTimeout(function () {
        d.querySelector('.loader-element').classList.add('hide');
      }, 200);
    }, 1000);
  }

  var iconNotifications = d.querySelector('.icon-notifications');

  if (iconNotifications) {
    var unreadNotifications = d.querySelector('.unread-notifications');
    var bellShake = d.querySelector('.bell-shake');

    if (iconNotifications.getAttribute('data-unread-notifications') === 'true') {
      unreadNotifications.style.display = 'block';
    } else {
      unreadNotifications.style.display = 'none';
    } // bell shake


    var shakingInterval = setInterval(function () {
      if (iconNotifications.getAttribute('data-unread-notifications') === 'true') {
        if (bellShake.classList.contains('shaking')) {
          bellShake.classList.remove('shaking');
        } else {
          bellShake.classList.add('shaking');
        }
      }
    }, 5000);
    iconNotifications.addEventListener('show.bs.dropdown', function () {
      bellShake.setAttribute('data-unread-notifications', false);
      clearInterval(shakingInterval);
      bellShake.classList.remove('shaking');
      unreadNotifications.style.display = 'none';
    });
  }

  [].slice.call(d.querySelectorAll('[data-background]')).map(function (el) {
    el.style.background = 'url(' + el.getAttribute('data-background') + ')';
  });
  [].slice.call(d.querySelectorAll('[data-background-lg]')).map(function (el) {
    if (document.body.clientWidth > breakpoints.lg) {
      el.style.background = 'url(' + el.getAttribute('data-background-lg') + ')';
    }
  });
  [].slice.call(d.querySelectorAll('[data-background-color]')).map(function (el) {
    el.style.background = 'url(' + el.getAttribute('data-background-color') + ')';
  });
  [].slice.call(d.querySelectorAll('[data-color]')).map(function (el) {
    el.style.color = 'url(' + el.getAttribute('data-color') + ')';
  }); // Tooltips

  var tooltipTriggerList = [].slice.call(d.querySelectorAll('[data-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  }); // Popovers

  var popoverTriggerList = [].slice.call(d.querySelectorAll('[data-toggle="popover"]'));
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  }); // Datepicker

  var datepickers = [].slice.call(d.querySelectorAll('[data-datepicker]'));
  var datepickersList = datepickers.map(function (el) {
    return new Datepicker(el, {
      buttonClass: 'btn'
    });
  });

  if (d.querySelector('.input-slider-container')) {
    [].slice.call(d.querySelectorAll('.input-slider-container')).map(function (el) {
      var slider = el.querySelector(':scope .input-slider');
      var sliderId = slider.getAttribute('id');
      var minValue = slider.getAttribute('data-range-value-min');
      var maxValue = slider.getAttribute('data-range-value-max');
      var sliderValue = el.querySelector(':scope .range-slider-value');
      var sliderValueId = sliderValue.getAttribute('id');
      var startValue = sliderValue.getAttribute('data-range-value-low');
      var c = d.getElementById(sliderId),
          id = d.getElementById(sliderValueId);
      noUiSlider.create(c, {
        start: [parseInt(startValue)],
        connect: [true, false],
        //step: 1000,
        range: {
          'min': [parseInt(minValue)],
          'max': [parseInt(maxValue)]
        }
      });
    });
  }

  if (d.getElementById('input-slider-range')) {
    var c = d.getElementById("input-slider-range"),
        low = d.getElementById("input-slider-range-value-low"),
        e = d.getElementById("input-slider-range-value-high"),
        f = [d, e];
    noUiSlider.create(c, {
      start: [parseInt(low.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
      connect: !0,
      tooltips: true,
      range: {
        min: parseInt(c.getAttribute('data-range-value-min')),
        max: parseInt(c.getAttribute('data-range-value-max'))
      }
    }), c.noUiSlider.on("update", function (a, b) {
      f[b].textContent = a[b];
    });
  } //Chartist


  if (d.querySelector('.ct-chart-sales-value')) {
    //Chart 5
    new Chartist.Line('.ct-chart-sales-value', {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      series: [[0, 10, 30, 40, 80, 60, 100]]
    }, {
      low: 0,
      showArea: true,
      fullWidth: true,
      plugins: [Chartist.plugins.tooltip()],
      axisX: {
        // On the x-axis start means top and end means bottom
        position: 'end',
        showGrid: true
      },
      axisY: {
        // On the y-axis start means left and end means right
        showGrid: false,
        showLabel: false,
        labelInterpolationFnc: function labelInterpolationFnc(value) {
          return '$' + value / 1 + 'k';
        }
      }
    });
  }

  if (d.querySelector('.ct-chart-ranking')) {
    var chart = new Chartist.Bar('.ct-chart-ranking', {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      series: [[1, 5, 2, 5, 4, 3], [2, 3, 4, 8, 1, 2]]
    }, {
      low: 0,
      showArea: true,
      plugins: [Chartist.plugins.tooltip()],
      axisX: {
        // On the x-axis start means top and end means bottom
        position: 'end'
      },
      axisY: {
        // On the y-axis start means left and end means right
        showGrid: false,
        showLabel: false,
        offset: 0
      }
    });
    chart.on('draw', function (data) {
      if (data.type === 'line' || data.type === 'area') {
        data.element.animate({
          d: {
            begin: 2000 * data.index,
            dur: 2000,
            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
            to: data.path.clone().stringify(),
            easing: Chartist.Svg.Easing.easeOutQuint
          }
        });
      }
    });
  }

  if (d.querySelector('.ct-chart-traffic-share')) {
    var data = {
      series: [70, 20, 10]
    };

    var sum = function sum(a, b) {
      return a + b;
    };

    new Chartist.Pie('.ct-chart-traffic-share', data, {
      labelInterpolationFnc: function labelInterpolationFnc(value) {
        return Math.round(value / data.series.reduce(sum) * 100) + '%';
      },
      low: 0,
      high: 8,
      donut: true,
      donutWidth: 20,
      donutSolid: true,
      fullWidth: false,
      showLabel: false,
      plugins: [Chartist.plugins.tooltip()]
    });
  }

  if (d.getElementById('loadOnClick')) {
    d.getElementById('loadOnClick').addEventListener('click', function () {
      var button = this;
      var loadContent = d.getElementById('extraContent');
      var allLoaded = d.getElementById('allLoadedText');
      button.classList.add('btn-loading');
      button.setAttribute('disabled', 'true');
      setTimeout(function () {
        loadContent.style.display = 'block';
        button.style.display = 'none';
        allLoaded.style.display = 'block';
      }, 1500);
    });
  }

  var scroll = new SmoothScroll('a[href*="#"]', {
    speed: 500,
    speedAsDuration: true
  });

  if (d.querySelector('.current-year')) {
    d.querySelector('.current-year').textContent = new Date().getFullYear();
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/ramon/workspace/php/mapos-laravel/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /home/ramon/workspace/php/mapos-laravel/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });