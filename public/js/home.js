$(document).ready(function() {

  var ctx = document.getElementById('barChart').getContext('2d');

  $.ajax({
    url: "/graph",
    type: 'GET',
    success: function(res) {
      var data = JSON.parse(res);
      var companies = [];
      var count = [];

      for (var i in data) {
        companies.push(data[i].name);
        count.push(data[i].employee_count);
      }

      var chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: companies,
          datasets: [{
            label: 'Employees',
            data: count,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
          }]
        }
      });
    },
    error: function (res) {
            //console.log(res.data);
          }
        });

  var gender = document.getElementById('gender').getContext('2d');
  var contracts = document.getElementById('contracts').getContext('2d');
  var departments = document.getElementById('departments').getContext('2d');
  var age = document.getElementById('age').getContext('2d');
  var roles = document.getElementById('roles').getContext('2d');

  $.ajax({
    type: "POST",
    url: "/reports/data",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: { company_id: '', home: 'true' },
    dataType: 'json',
    success: function(data){
      console.log(data);

      departmentsChart(data.departments, departments);
      ageChart(data.age, age);
      rolesChart(data.roles, roles);
      genderChart(data.gender, gender);
      contractsChart(data.contracts, contracts);
    }
  });
});

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