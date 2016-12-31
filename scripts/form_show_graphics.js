function coloca_grafico(variavel,cor,local){

var data = variavel;

var colors = [cor];

var margin = {top: 50, right: 30, bottom: 30, left: 40},
    width = 1000 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;
    //barWidth = width / data.length;

var type = function(d) {
  d = +d;
  return d;
};

var randomColor = function() {
  return colors[Math.floor(Math.random()*colors.length)];
};

var x = d3.scale.ordinal()
  .domain(data.map(function(d) { return d["Categoria"]; }))
  .rangeRoundBands([0, width], .2);

var y = d3.scale.linear()
  .domain([0, d3.max(data, function(d) { return 5; })])
  .range([height, 0]);

var xAxis = d3.svg.axis()
  .scale(x)
  .orient("bottom");

var yAxis = d3.svg.axis()
  .scale(y)
  .orient("left")
  .ticks(10);

//svg
var bars = d3.select(local)
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

bars.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(0," + height + ")")
  .call(xAxis);

bars.append("g")
    .attr("class", "y axis")
    .call(yAxis)
  .append("text")
    //.attr("transform", "rotate(-90)")
    .attr("y", 6)
    .attr("dy", "2em")
    .style("text-anchor", "end")
    .text("");

bars.selectAll(".bar")
.data(data)
  .enter().append("rect")
    .attr("class", "bar")
    .attr("x", function(d) { return x(d["Categoria"]); })
    .attr("y", function(d) { return y(d["Nota"]); })
    .attr("width", x.rangeBand())
    .attr("y", height)
    .attr("height", 0)
    .attr("fill", function() { return randomColor(); })
    .transition().delay(function (d,i){ return i * 250;})
    .duration(250)
    .ease("exp-in-out")
    .attr("y", function(d) { return y(d["Nota"]); })
    .attr("height", function(d) { return height - y(d["Nota"]); });
}

coloca_grafico(variavel_chart1,"red",".chart1");
coloca_grafico(variavel_chart2,"blue",".chart2");
coloca_grafico(variavel_chart3,"black",".chart3");
coloca_grafico(variavel_chart4,"green",".chart4");
coloca_grafico(variavel_chart5,"magenta",".chart5");
//coloca_grafico(variavel_chart5,cor,local);
