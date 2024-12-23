/*! For license information please see clinic-statistics.js.LICENSE.txt */
"use strict";document.addEventListener("DOMContentLoaded",(function(){window.randomScalingFactor=function(){return Math.round(20*Math.random())};var a=document.getElementById("areachartblue1").getContext("2d"),o=a.createLinearGradient(0,0,0,65);o.addColorStop(0,"rgba(1, 94, 194, 0.85)"),o.addColorStop(1,"rgba(0, 197, 221, 0)");var r={type:"line",data:{labels:["1","2","3","4","5","7","8"],datasets:[{label:"# of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:0,backgroundColor:o,borderColor:"#015EC2",borderWidth:0,borderRadius:4,fill:!0,tension:.5}]},options:{maintainAspectRatio:!1,plugins:{legend:{display:!1},tooltip:{enabled:!1}},scales:{y:{display:!1,beginAtZero:!0},x:{display:!1}}}},t=(new Chart(a,r),document.getElementById("areachartred1").getContext("2d")),n=t.createLinearGradient(0,0,0,65);n.addColorStop(0,"rgba(240, 61, 79, 0.85)"),n.addColorStop(1,"rgba(255, 223, 220, 0)");var e={type:"line",data:{labels:["1","2","3","4","5","7","8"],datasets:[{label:"# of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:0,backgroundColor:n,borderColor:"#f03d4f",borderWidth:0,borderRadius:4,fill:!0,tension:.5}]},options:{maintainAspectRatio:!1,plugins:{legend:{display:!1},tooltip:{enabled:!1}},scales:{y:{display:!1,beginAtZero:!0},x:{display:!1}}}},d=(new Chart(t,e),document.getElementById("areachartgreen1").getContext("2d")),l=d.createLinearGradient(0,0,0,65);l.addColorStop(0,"rgba(145, 195, 0, 0.85)"),l.addColorStop(1,"rgba(176, 197, 0, 0)");var i={type:"line",data:{labels:["1","2","3","4","5","7","8"],datasets:[{label:"# of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:0,backgroundColor:l,borderColor:"#91C300",borderWidth:0,borderRadius:4,fill:!0,tension:.5}]},options:{maintainAspectRatio:!1,plugins:{legend:{display:!1},tooltip:{enabled:!1}},scales:{y:{display:!1,beginAtZero:!0},x:{display:!1}}}},c=(new Chart(d,i),document.getElementById("areachartyellow1").getContext("2d")),g=c.createLinearGradient(0,0,0,65);g.addColorStop(0,"rgba(253, 100, 0, 0.85)"),g.addColorStop(1,"rgba(253, 186, 0, 0)");var s={type:"line",data:{labels:["1","2","3","4","5","7","8"],datasets:[{label:"# of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:0,backgroundColor:g,borderColor:"#fdba00",borderWidth:0,borderRadius:4,fill:!0,tension:.5}]},options:{maintainAspectRatio:!1,plugins:{legend:{display:!1},tooltip:{enabled:!1}},scales:{y:{display:!1,beginAtZero:!0},x:{display:!1}}}},m=(new Chart(c,s),document.getElementById("patientsummary").getContext("2d")),p=m.createLinearGradient(0,0,0,200);p.addColorStop(0,"rgba(88, 64, 239, 0.85)"),p.addColorStop(1,"rgba(88, 64, 239, 0)");var b=m.createLinearGradient(0,0,0,200);b.addColorStop(0,"rgba(145, 195, 0, 0.85)"),b.addColorStop(1,"rgba(176, 197, 0, 0)");var S={type:"bar",data:{labels:["1/9","2/9","3/9","4/9","5/9","6/9","7/9","8/9","9/9","10/9"],datasets:[{label:"# of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:0,backgroundColor:p,borderColor:"#5840ef",borderWidth:1,fill:!0},{label:"earning of Votes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],radius:0,backgroundColor:b,borderColor:"#91C300",borderWidth:1,fill:!0}]},options:{maintainAspectRatio:!1,barThickness:16,borderRadius:2,plugins:{legend:{display:!1}},scales:{y:{display:!1,beginAtZero:!0},x:{grid:{display:!1},display:!0,beginAtZero:!0}}}},F=(new Chart(m,S),document.getElementById("doughnutchart").getContext("2d")),u=(new Chart(F,{type:"polarArea",data:{labels:["0-15","16-30","31-45","46-60","60+"],datasets:[{label:"Age Range",data:[40,10,15,25,10],backgroundColor:["#6faa00","#ffc107","#fd7e14","#5840ef","#becede"],borderWidth:0}]},options:{responsive:!0,tooltips:{position:"nearest",yAlign:"bottom"},plugins:{legend:{display:!1,position:"top"},title:{display:!1,text:"Chart.js polarArea Chart"}}}}),document.getElementById("semidoughnutchart").getContext("2d"));new Chart(u,{type:"doughnut",data:{labels:["Daily Vages","Cancelled Bookings","Oxygen","Manpower","Medical Facilities"],datasets:[{label:"Expense categories",data:[40,35,15,25,20],backgroundColor:["#6faa00","#ffc107","#fd7e14","#5840ef","#becede"],borderWidth:0}]},options:{circumference:180,rotation:-90,responsive:!0,cutout:80,tooltips:{position:"nearest",yAlign:"bottom"},plugins:{legend:{display:!1,position:"top"},title:{display:!1,text:"Chart.js Doughnut Chart"}},layout:{padding:0}}});new Swiper(".swipernonav",{slidesPerView:"auto",spaceBetween:16,autoplay:{delay:2e3,disableOnInteraction:!1}})}));