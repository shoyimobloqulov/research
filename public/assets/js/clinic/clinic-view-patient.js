/*! For license information please see clinic-view-patient.js.LICENSE.txt */
"use strict";function lastvisibletd(){$(".table tbody tr td").removeClass("lastvisible"),$(".table tbody tr").each((function(){$(this).find("td:visible:last").addClass("lastvisible")}))}document.addEventListener("DOMContentLoaded",(function(){window.Dropzone,window.randomScalingFactor=function(){return Math.round(20*Math.random())};var a=document.getElementById("patientsummary").getContext("2d"),t={type:"line",data:{labels:["1/8","2/8","3/8","4/8","5/8","6/8","7/8"],datasets:[{label:"# of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:2,backgroundColor:"rgba(0, 0, 0, 0)",borderColor:"#5840ef",borderWidth:3,fill:!0,tension:.3}]},options:{maintainAspectRatio:!1,plugins:{legend:{display:!1}},scales:{y:{display:!1,beginAtZero:!0},x:{grid:{display:!1},display:!0,beginAtZero:!0}}}};new Chart(a,t);$("#clientScheduleGrid").DataTable({searching:!1,lengthChange:!1,autoWidth:!1,columnDefs:[{orderable:!1,targets:4}],order:[[0,"desc"]],pageLength:4,responsive:!0})})),window.addEventListener("resize",(function(){$("#clientScheduleGrid").DataTable().columns.adjust().draw(),lastvisibletd()}));