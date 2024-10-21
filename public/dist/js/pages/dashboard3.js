/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $grafikPermohonanPengajuan = $('#grafikPermohonanPengajuan')
  // eslint-disable-next-line no-unused-vars
  var grafikPermohonanPengajuan = new Chart($grafikPermohonanPengajuan, {
    type: 'bar',
    data: {
      labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [10, 20, 30, 25, 27, 25, 30, ]
        },
        {
          backgroundColor: '#28a745',
          borderColor: '#28a745',
          data: [7, 17, 27, 20, 18, 15, 20]
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
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return value
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

  // Misalkan data diambil dari server dan disertakan dalam variabel JavaScript
  var dataGrafik = {
    labels: ['BERKALA', 'SERTA MERTA', 'SETIAP SAAT', 'DIKECUALIKAN'],
    values: [10, 12, 14, 19]
  };

  var $grafikInformasiPublik = $('#grafikInformasiPublik')
  // eslint-disable-next-line no-unused-vars
  var grafikInformasiPublik = new Chart($grafikInformasiPublik, {
    type: 'bar',
    data: {
      labels: dataGrafik.labels, // Menggunakan data dari variabel
      datasets: [
        {
          backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'], // Tambahkan warna berbeda untuk setiap label
          borderColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
          data: dataGrafik.values // Menggunakan data dari variabel
        },
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
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return value
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
