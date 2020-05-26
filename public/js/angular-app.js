angular.module('app', [

    ], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
.controller('reportsController', function($scope, $http, $timeout, Excel){

    $scope.birthdayReport = true;
    $scope.warningReport = false;
    $scope.qualificationReport = false;
    $scope.resignationReport = false;
    $scope.retirementReport = false;
    $scope.contractsReport = false;
    $scope.contactTypesReport = false;
    $scope.departmentsReport = false;
    $scope.branchesReport = false;
    $scope.driversLicenseReport = false;
    $scope.title = 'Bithdays for This Month Report';
    $scope.formData = {};

    $scope.showWarningReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = true;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Warning Report'
    }

    $scope.showResignationReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = true;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Resignation Report'
    }

    $scope.showRetirementReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = true;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Employees About to Retire Report'
    }

    $scope.showContractsReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = true;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Contracts About to Expire Report'
    }

    $scope.showQualificationsReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = true;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Employee Qualification Report'
    }

    $scope.showBirthdayReports = function(){
        $scope.birthdayReport = true;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Bithdays for This Month Report'
    }

    $scope.showContactTypesReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = true;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Employees by Contract Types Reports'
    }

    $scope.showDepartmentsReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = true;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = false;
        $scope.title = 'Employees by Department'
    }

    $scope.showBranchesReports = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = true;
        $scope.driversLicenseReport = false;
        $scope.title = 'Employees by Branch'
    }

    $scope.showDriversLicenseReport = function(){
        $scope.birthdayReport = false;
        $scope.warningReport = false;
        $scope.qualificationReport = false;
        $scope.resignationReport = false;
        $scope.retirementReport = false;
        $scope.contractsReport = false;
        $scope.contactTypesReport = false;
        $scope.departmentsReport = false;
        $scope.branchesReport = false;
        $scope.driversLicenseReport = true;
        $scope.title = 'Employees with Drivers License'
    }

    $scope.getBithdayReport = function(){
        if ($scope.company_id == '' || typeof($scope.company_id) == 'undefined') {
            var params = {
                company_id: '',
                month: $scope.formData.month ? $scope.formData.month : ''
            };
        } else {

            var params = {
                company_id: $scope.company_id,
                month: $scope.formData.month ? $scope.formData.month : ''
            };
        }

        $http.post('/reports/downloadable/bithday', params, {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(
        function successCallback(response) {
            console.log(response.data);
            $scope.birthdays = response.data
            angular.element(document).ready(function () {
                dTable = $('#birthdayTable')
                dTable.DataTable();
            });
        }, function errorCallback(response) {
            console.log(response.data);
            $scope.birthdays = [];
        }
        );
    }

    $scope.getRetirementReport = function(){
        console.log(typeof($scope.company_id));
        if ($scope.company_id == '' || typeof($scope.company_id) == 'undefined') {
            var params = {
                company_id: ''
            };
        } else {
            var params = {
                company_id: $scope.company_id
            };
        }
        $http.post('/reports/downloadable/retirement', params, {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(
        function successCallback(response) {
            console.log(response.data);
            $scope.retirements = response.data
            angular.element(document).ready(function () {
                dTable = $('#retirementTable')
                dTable.DataTable();
            });
        }, function errorCallback(response) {
            console.log(response.data);
            $scope.retirements = [];
        }
        );
    }

    $scope.getQualificationsReport = function(){
            //console.log(typeof($scope.company_id));
            if ($scope.company_id == '' || typeof($scope.company_id) == 'undefined') {
                var params = {
                    company_id: '',
                    qualification_id: $scope.formData.qualification_id
                };
            } else {
                var params = {
                    company_id: $scope.company_id,
                    qualification_id: $scope.formData.qualification_id
                };
            }
            console.log(params);
            $http.post('/reports/downloadable/qualifications', params, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
            function successCallback(response) {
                console.log(response.data);
                $scope.qualifications = response.data
                angular.element(document).ready(function () {
                    dTable = $('#qualificationsTable')
                    dTable.DataTable();
                });
            }, function errorCallback(response) {
                console.log(response.data);
                $scope.qualifications = [];
            }
            );
        }

    $scope.getContractsReport = function(){
            //console.log(typeof($scope.company_id));
            if ($scope.company_id == '' || typeof($scope.company_id) == 'undefined') {
                var params = {
                    company_id: ''
                };
            } else {
                var params = {
                    company_id: $scope.company_id
                };
            }
            console.log(params);
            $http.post('/reports/downloadable/contracts', params, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
            function successCallback(response) {
                console.log(response.data);
                $scope.contracts = response.data
                angular.element(document).ready(function () {
                    dTable = $('#contractsTable')
                    dTable.DataTable();
                });
            }, function errorCallback(response) {
                console.log(response.data);
                $scope.contracts = [];
            }
            );
        }

    $scope.getContractTypesReport = function(){
            //console.log(typeof($scope.company_id));
            if ($scope.company_id == '' || typeof($scope.company_id) == 'undefined') {
                var params = {
                    company_id: ''
                };
            } else {
                var params = {
                    company_id: $scope.company_id
                };
            }
            console.log(params);
            $http.post('/reports/downloadable/contracts/types', params, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
            function successCallback(response) {
                console.log(response.data);
                $scope.contractTypes = response.data
                angular.element(document).ready(function () {
                    dTable = $('#contactTypeTable')
                    dTable.DataTable();
                });
            }, function errorCallback(response) {
                console.log(response.data);
                $scope.contractTypes = [];
            }
            );
        }

    $scope.getBranchesReport = function(){
            //console.log(typeof($scope.company_id));
            console.log($scope.formData.branch_id);
            
            var params = {
                    company_id: $scope.company_id ? $scope.company_id : '',
                    branch_id: $scope.formData.branch_id ? $scope.formData.branch_id : ''
                };
            console.log(params);
            $http.post('/reports/downloadable/branches', params, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
            function successCallback(response) {
                console.log(response.data);
                $scope.branches = response.data
                angular.element(document).ready(function () {
                    dTable = $('#branchesTable')
                    dTable.DataTable();
                });
            }, function errorCallback(response) {
                console.log(response.data);
                $scope.branches = [];
            }
            );
        }

    $scope.getDepartmentsReport = function(){            
            var params = {
                    company_id: $scope.company_id ? $scope.company_id : '',
                    department_id: $scope.formData.department_id ? $scope.formData.department_id : ''
                };
            console.log(params);
            $http.post('/reports/downloadable/departments', params, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
            function successCallback(response) {
                console.log(response.data);
                $scope.departments = response.data
                angular.element(document).ready(function () {
                    dTable = $('#departmentsTable')
                    dTable.DataTable();
                });
            }, function errorCallback(response) {
                console.log(response.data);
                $scope.departments = [];
            }
            );
        }

    $scope.getLicenseReport = function(){            
            var params = {
                    company_id: $scope.company_id ? $scope.company_id : ''
                };
            console.log(params);
            $http.post('/reports/downloadable/license', params, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(
            function successCallback(response) {
                console.log(response.data);
                $scope.licenses = response.data
                angular.element(document).ready(function () {
                    dTable = $('#departmentsTable')
                    dTable.DataTable();
                });
            }, function errorCallback(response) {
                console.log(response.data);
                $scope.licenses = [];
            }
            );
    }


    $scope.onCompanyChange = function(){
                if ($scope.company_id == '' || typeof($scope.company_id) == 'undefined') {
                   //alert("Select a company");
               } else {
                   var params = {
                       company_id: $scope.company_id
                   };
               }

               $http.post('/reports/downloadable/company/branches', params, {
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               }).then(
               function successCallback(response) {
                   console.log(response.data);
                   $scope.companyBranches = response.data

               }, function errorCallback(response) {
                   console.log(response.data);
                   $scope.companyBranches = [];
               }
               );
        }

    $scope.exportToExcel = function(tableId){ 
        // ex: '#my-table'
        var exportHref = Excel.tableToExcel(tableId,'WireWorkbenchDataExport');
            $timeout(function(){location.href = exportHref;},100); // trigger download
        }
        
    })
    .factory('Excel',function($window){
        var uri='data:application/vnd.ms-excel;base64,',
        template='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64=function(s){return $window.btoa(unescape(encodeURIComponent(s)));},
        format=function(s,c){return s.replace(/{(\w+)}/g,function(m,p){return c[p];})};
        return {
            tableToExcel:function(tableId,worksheetName){
                var table=$(tableId),
                ctx={worksheet:worksheetName,table:table.html()},
                href=uri+base64(format(template,ctx));
                return href;
            }
        };
    });