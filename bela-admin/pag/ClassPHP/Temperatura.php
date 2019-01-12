<?php 
    $_REQUEST['web'] = true;
    class Temperatura 
    {
        function __construct()
        {
        }
        public function GraficoBarra($periodicidade, $periodo, $Objeto, $idObbjeto) 
        {
            $_REQUEST['acao'] = $acao;
            include_once("../../../../../webservice.php");
            switch ($Objeto)
            {
                case 'Granja':
                    switch ($periodicidade)
                    {
                        case 'Diario':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00', '24:00'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                        
                        case 'Semanal':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado', 'Domingo'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                        
                        case 'Mensal':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['01', '04', '07', '10', '13', '16', '19', '21', '24', '27', '30'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;  
                        
                        case 'Ciclo':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['01', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;

                        case 'Anual':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                    }
                    break;

                case 'Aviario':
                    switch ($periodicidade)
                    {
                        case 'Diario':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00', '24:00'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                        
                        case 'Semanal':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado', 'Domingo'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                        
                        case 'Mensal':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['01', '04', '07', '10', '13', '16', '19', '21', '24', '27', '30'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;  
                        
                        case 'Ciclo':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['01', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;

                        case 'Anual':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;  
                    }
                    break;

                case 'Granjeiro':
                    switch ($periodicidade)
                    {
                        case 'Diario':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00', '24:00'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                        
                        case 'Semanal':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado', 'Domingo'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                        
                        case 'Mensal':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['01', '04', '07', '10', '13', '16', '19', '21', '24', '27', '30'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;  
                        
                        case 'Ciclo':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['01', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;

                        case 'Anual':
                            echo "  <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                            <div class='ct-chart-line white-box ct-chart-line' id='ct-chart'></div>
                                <script>
                                    var labels = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                                    var data = {
                                        labels: labels,
                                        series: [
                                            [4, 2, 20, 4, 5, 3, 5, ],
                                            [2, 5, 2, 6, 2, 5, 2, 4]
                                        ],
                                    };
                                    var options = {
                                        width: '70%',
                                        height: '300px'
                                    };
                                    var interpolation =  {
                                        top: 0,
                                        low: 1,
                                        showPoint: true,
                                        fullWidth: true,
                                        axisY: {
                                            labelInterpolationFnc: function(value) {
                                                return (value / 1) + 'ºC';
                                            }
                                        },
                                        showArea: true,
                                        width: '70%',
                                        height: '300px'
                                    };
                                    new Chartist.Line('#ct-chart', data, interpolation);;
                                </script>
                            </div>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
                            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>";
                            break;
                    }
                    break;
            }
        }

        public function IndiceMedio($periodicidade, $periodo, $Objeto, $idObbjeto) 
        {
            switch ($Objeto)
            {
                case 'Granja':
                    switch ($periodicidade)
                    {
                        case 'Diario':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                        
                        case 'Semanal':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                        
                        case 'Mensal':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;  
                        
                        case 'Ciclo':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;

                        case 'Anual':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                    }
                    break;

                case 'Aviario':
                    switch ($periodicidade)
                    {
                        case 'Diario':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                        
                        case 'Semanal':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                        
                        case 'Mensal':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;  
                        
                        case 'Ciclo':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;

                        case 'Anual':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                    }
                    break;

                case 'Granjeiro':
                    switch ($periodicidade)
                    {
                        case 'Diario':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                        
                        case 'Semanal':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                        
                        case 'Mensal':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;  
                        
                        case 'Ciclo':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;

                        case 'Anual':
                            echo "<div>
                                <div class='white-box analytics-info'>
                                    <h3 class='box-title'>Temperatura média</h3>
                                    <ul class='list-inline two-part'>
                                        <li>
                                            <div id='sparklinedash'></div>
                                        </li>
                                        <li class='text-right'>
                                            <i class='ti-arrow-up text-success''></i> 
                                            <span class='counter text-success'>$media</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>";
                            break;
                    }
                    break;
            }
        }
    }
?>