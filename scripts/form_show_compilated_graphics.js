function fnDrawMultiLineChart(Data, DivID, RevenueName) {
            var margin = { top: 20, right: 80, bottom: 30, left: 50 },
             width = 800 - margin.left - margin.right,
             height = 350 - margin.top - margin.bottom;

            var parseDate = d3.time.format("%b-%Y");

            var x = d3.scale.ordinal()
                    .rangeRoundBands([0, width]);

            var y = d3.scale.linear()
                    .range([height, 0]);

            var color = d3.scale.category10();

            var xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom");

            var yAxis = d3.svg.axis()
                .scale(y)
                .orient("left")
                .ticks(10);

            // xData gives an array of distinct 'Weeks' for which trends chart is going to be made.
            var xData = Data[0]["Avaliations"].map(function (d) { return parseDate(new Date(d["DateSubm"])); });
            //console.log(xData);

            var line = d3.svg.line()
                //.interpolate("basis")
                .x(function (d) { return x(parseDate(new Date(d["DateSubm"]))) + x.rangeBand() / 2; })
                .y(function (d) { return y(d["Rate"]); });

            var svg = d3.select("#" + DivID).append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            color.domain(Data.map(function (d) { return d["Category"]; }));

            x.domain(xData);

            var valueMax = d3.max(Data, function (r) { return d3.max(r["Avaliations"], function (d) { return d["Rate"]; }) });
            var valueMin = d3.min(Data, function (r) { return d3.min(r["Avaliations"], function (d) { return d["Rate"]; }) });
            y.domain([valueMin, valueMax]);

            //Drawing X Axis
            svg.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + height + ")")
                    .call(xAxis);

            // Drawing Horizontal grid lines.
            svg.append("g")
                .attr("class", "GridX")
              .selectAll("line.grid").data(y.ticks()).enter()
                .append("line")
                .attr(
                {
                    "class": "grid",
                    "x1": x(xData[0]),
                    "x2": x(xData[xData.length - 1]) + x.rangeBand() / 2,
                    "y1": function (d) { return y(d); },
                    "y2": function (d) { return y(d); }
                });
            // Drawing Y Axis
            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis)
                .append("text")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", ".71em")
                    .style("text-anchor", "end")
                    .text(RevenueName);

            // Drawing Lines for each segments
            var segment = svg.selectAll(".segment")
                            .data(Data)
                            .enter().append("g")
                            .attr("class", "segment");

            segment.append("path")
                    .attr("class", "line")
                    .attr("id", function (d) { return d["Category"]; })
                    .attr("visible",1)
                    .attr("d", function (d) { return line(d["Avaliations"]); })
                    .style("stroke", function (d) { return color(d["Category"]); });
                        // Creating Dots on line
            segment.selectAll("dot")
                    .data(function (d) { return d["Avaliations"]; })
                    .enter().append("circle")
                    .attr("r", 5)
                    .attr("cx", function (d) { return x(parseDate(new Date(d["DateSubm"]))) + x.rangeBand() / 2; })
                    .attr("cy", function (d) { return y(d["Rate"]); })
                    .style("stroke", "white")
                    .style("fill", function (d) { return color(this.parentNode.__data__["Category"]); })
                    .on("mouseover", mouseover)
                    .on("mousemove", function (d) {
                        divToolTip
                        .text(this.parentNode.__data__["Category"] +" : "+ d["Rate"])
                        .style("left", (d3.event.pageX + 15) + "px")
                        .style("top", (d3.event.pageY - 10) + "px");
                    })
                    .on("mouseout", mouseout);

            segment.append("text")
                    .datum(function (d) { return { Category: d["Category"], RevData: d["Avaliations"][d["Avaliations"].length - 1] }; })
                    .attr("transform", function (d) {
                        var xpos = x(parseDate(new Date(d.RevData["DateSubm"]))) + x.rangeBand() / 2;
                        return "translate(" + xpos + "," + y(d.RevData["Rate"]) + ")";
                    })
                    .attr("x", 50)
                    .attr("dy", ".35em")
                    .attr("class", "segmentText")
                    .attr("Segid", function (d) { return d["Category"]; })
                  //  .text(function (d) { return d["Category"] ; });

            d3.selectAll(".segmentText").on("click", function (d) {
                var tempId = d3.select(this).attr("Segid");
                var flgVisible = d3.select("#" + tempId).attr("visible");

                var newOpacity = flgVisible == 1 ? 0 : 1;
                flgVisible = flgVisible == 1 ? 0 : 1;

                // Hide or show the elements
                d3.select("#" + tempId).style("opacity", newOpacity)
                    .attr("visible", flgVisible);

            });
             // Adding Tooltip
            var divToolTip = d3.select("body").append("div")
                        .attr("class", "tooltip")
                        .style("opacity", 1e-6);

            function mouseover() {
                divToolTip.transition()
                    .duration(500)
                    .style("opacity", 1);
            }
            function mouseout() {
                divToolTip.transition()
                    .duration(500)
                    .style("opacity", 1e-6);
            }
        }
//
function count_object_and_prompt_graphs(json_data){
  for(i=0;i<json_data.length;i++){
    var string_div = "divChartTrends";
    var string_div = string_div.concat(i.toString());
    $("."+string_div).html("<h2>" + json_data[i][0]["Section Name"] + "</h2>");
    fnDrawMultiLineChart((json_data[i][0]["Section Content"]), string_div, "Notas");



  }
}

// Calling function
count_object_and_prompt_graphs(variavel_chart);
