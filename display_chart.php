<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
            // google.charts.load('current', {
            //     'packages': ['bar']
            // });
            // google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart(res, title) {
                var data = new google.visualization.DataTable();


                data.addColumn('string', 'Course');
                data.addColumn('number', 'Students');
                $.each(res, function(i, res) {
                    var students = parseInt(res.Students);
                    var course = res.course;
                    data.addRows([
                        [course, students]
                    ])
                })


            //   ['Sales', 'Year'],
            //   ["King's pawn (e4)", 44],
            //   ["Queen's pawn (d4)", 31],
            //   ["Knight to King 3 (Nf3)", 12],
            //   ["Queen's bishop pawn (c4)", 10],
            //   ['Other', 3]


            var options = {
                title: "Year Wise Sales Analysis",
                is3D: true,
                height: 700,
                // hAxis: {
                //     title: 'Courses'
                // },
                // vAxis: {
                //     title: 'Students'

                // }
            };
            // var chart = new google.visualization.LineChart(document.getElementById('saleschart'));
            var chart = new google.visualization.PieChart(document.getElementById('saleschart'));
            // Convert the Classic options to Material options.
            // chart.draw(data, google.charts.Bar.convertOptions(options));
            chart.draw(data, options);
        };
    </script>
</head>

<body>
    <div id="saleschart" style="width: 800px; height: 600px;"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var title = "Course Analysis";
            $.ajax({
                type: "post",
                url: "code.php",
                data: {
                    action: "studentAddmisson"
                },
                dataType: "JSON",
                success: function(res) {
                    console.log(res);
                    drawChart(res, title);
                }
            })
        })
    </script>

</html>