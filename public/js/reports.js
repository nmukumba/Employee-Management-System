$(document).ready(function() {

  var gender = document.getElementById('gender').getContext('2d');
  var contracts = document.getElementById('contracts').getContext('2d');
  var departments = document.getElementById('departments').getContext('2d');
  var age = document.getElementById('age').getContext('2d');
  var roles = document.getElementById('roles').getContext('2d');
  var branches = document.getElementById('branches').getContext('2d');

  $.ajax({
    type: "POST",
    url: "/reports/data",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: { company_id: getParameterValues('id'), home: '' },
    dataType: 'json',
    success: function(data){
      console.log(data);
      departmentsChart(data.departments, departments);
      ageChart(data.age, age);
      rolesChart(data.roles, roles);
      genderChart(data.gender, gender);
      contractsChart(data.contracts, contracts);
      branchesChart(data.branches, branches);
    }
  });


});

function getParameterValues(param) {  
  var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
  for (var i = 0; i < url.length; i++) {  
    var urlparam = url[i].split('=');  
    if (urlparam[0] == param) {  
      return urlparam[1];  
    }  
  }  
}

function departmentsChart(data, chart){
  var departmentNames = [];
  var departmentsCount = [];

  for (var i in data) {
    departmentNames.push(data[i].name);
    departmentsCount.push(data[i].count);
  }

  var departmentsChart = new Chart(chart, {
    type: 'bar',
    data: {
      labels: departmentNames,
      datasets: [{
        label: 'Employees',
        data: departmentsCount,
        backgroundColor: 'rgba(0, 119, 204, 0.3)'
      }]
    }
  });
}

function branchesChart(data, chart){
  var names = [];
  var count = [];

  for (var i in data) {
    names.push(data[i].name);
    count.push(data[i].count);
  }

  var graph = new Chart(chart, {
    type: 'bar',
    data: {
      labels: names,
      datasets: [{
        label: 'Employees',
        data: count,
        backgroundColor: 'rgba(0, 119, 204, 0.3)'
      }]
    }
  });
}

function ageChart(data, chart){
  var age = [];
  var count = [];

  for (var i in data) {
    age.push(data[i].age);
    count.push(data[i].count);
  }

  var graph = new Chart(chart, {
    type: 'bar',
    data: {
      labels: age,
      datasets: [{
        label: 'Employees',
        data: count,
        backgroundColor: 'rgba(0, 119, 204, 0.3)'
      }]
    }
  });
}

function rolesChart(data, chart){
  var roles = [];
  var count = [];

  for (var i in data) {
    roles.push(data[i].name);
    count.push(data[i].count);
  }

  var graph = new Chart(chart, {
    type: 'bar',
    data: {
      labels: roles,
      datasets: [{
        label: 'Employees',
        data: count,
        backgroundColor: 'rgba(0, 119, 204, 0.3)'
      }]
    }
  });
}

function genderChart(data, chart){
  var gender = [];
  var count = [];

  for (var i in data) {
    gender.push(data[i].label);
    count.push(data[i].value);
  }

  var graph = new Chart(chart, {
    type: 'doughnut',
    data: {
      labels: gender,
      datasets: [{
        label: 'Employees',
        data: count,
        backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }]
    }
  });
}

function contractsChart(data, chart){
  var contracts = [];
  var count = [];

  for (var i in data) {
    contracts.push(data[i].label);
    count.push(data[i].value);
  }

  var graph = new Chart(chart, {
    type: 'doughnut',
    data: {
      labels: contracts,
      datasets: [{
        label: 'Employees',
        data: count,
        backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }]
    }
  });
}