var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<form class="row"><div class="col-sm-3"><div class="form-group"><input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name"></div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="Age" name="Age" placeholder="Age"> </div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree"> </div></div><div class="col-sm-3"> <div class="form-group"> </div></div><div class="col-sm-2"> <div class="form-group"> </div></div></form>';

    objTo.appendChild(divtest)
}

