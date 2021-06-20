/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#20c997',
          borderColor: '#20c997',
          data: [25000000, 15000000, 18450000, 32000000, 12000000, 7500000, 9500000, 27540000, 0]
        },
        {
          backgroundColor: '#c92020',
          borderColor: '#c92020',
          data: [5000000, 0, 0, 0, 0, 0, 0,
            0, 0]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000000) {
                value /= 1000000
                value += ' juta'
              }

              return 'Rp.' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

})

// lgtm [js/unused-local-variable]
