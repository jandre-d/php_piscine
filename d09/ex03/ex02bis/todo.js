
$(document).ready(function(){
	var arr = document.cookie.split(';');
	for (i = 0; i < arr.length; i++) {
		tmp = arr[i].split('=');
		if (tmp.length != 2)
			return ;
		set_element(tmp[1]);
	}
})

function cookie_del(msg) {
	document.cookie = msg + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function kak() {
	var todo_msg = prompt("Enter todo");
	if (todo_msg == "" || todo_msg == null)
		return ;
	set_element(todo_msg);
	document.cookie = todo_msg + "=" + todo_msg + ";";
}

function set_element(msg) {
	$('#ft_list').prepend($('<div class="content">' + msg + '</div>').click(remove_element));
}

function remove_element() {
	if (confirm("Remove todo?")) {
		this.remove();
		cookie_del(this.innerHTML);
	}
}
