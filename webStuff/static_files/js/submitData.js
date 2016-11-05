function takeDataIn() {
	//orgs name
	
	var orgName = document.getElementById('orgName').value;
    console.log("orgName = "+ orgName);
	

	//survyes name
	var surveyName = document.getElementById('surveyName').value;
    console.log("surveyName = " + surveyName);

	//gender
	var gender = document.getElementById('gender').checked;
    console.log("gender = "+ gender);

	//age
	var age = document.getElementById('age').checked;
    console.log("age = "+ age);

	//ethnicity
	var ethnicity = document.getElementById('ethnicity').checked;
    console.log("ethnicity = "+ ethnicity);

	//inside or outside
	var insideOut = document.getElementById('insideOut').checked;
    console.log("insideOut = "+ insideOut);

	//major
	var major = document.getElementById('major').checked;
    console.log("major = "+ major);

	//extra
	var extra = document.getElementById('extra').value;
    console.log("extra = "+ extra);

    //Breaking up the extra options
    var mainInput = extra.split(';'); // can do '\n'
    //number of extra options
    numberOfExtraOptions = (mainInput.length -1);
    
    var listOfCommands = [];
    //breakign down the different options

    var list = [];

    for (var i = 0; i < numberOfExtraOptions; i++) {
    	var singleOption = mainInput[i].split(':');
    	list.push({ name: singleOption[0] , options: singleOption[1]});
    };

    console.log(list[0]);
     console.log(list[1]);
    

}
