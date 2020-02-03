

var todo = [];


function id_unique(){
	var to_return = '_' + Math.random().toString(36).substr(2, 9);
	if (to_return in todo)
		return (id_unique());
	return (to_return);
}

function data_save() {
	document.cookie = JSON.stringify(todo);
	return ("SAVED");
}

function data_load() {
	var data = document.cookie;
	if (data)
	{
		todo = JSON.parse(data);
		console.log(data);
	}
	else
		console.log("EMPTY");
	return ("LOADED");
}

function init()
{
	data_load();
	for (var i = 0; i < todo.length; i++) {
		create_element(todo[i][0], todo[i][1]);
	}
}

function todo_prom() {
	var todo_msg = prompt("Enter todo");
	if (todo_msg == "" || todo_msg == null)
		return ;
	var new_id = id_unique();
	todo.push([todo_msg, new_id]);
	create_element(todo_msg,new_id);
	data_save();
}

function create_element(data,element_id) {
	var ft_list = document.getElementById("ft_list");
	var todo_list = document.getElementsByClassName("content");
	var element = document.createElement("div");
	element.setAttribute("class","content");
	element.setAttribute("id",element_id);
	element.setAttribute("onclick","remove_element(this)");
	element.innerHTML = data;
	ft_list.insertBefore(element,todo_list[0]);
}

function remove_element(element) {
	if (confirm("Remove todo?")) {
		element.parentElement.removeChild(element);
		todo = todo.filter(function (e) {
			return (e[1] !== element.id);
		});
		data_save();
	}
}


