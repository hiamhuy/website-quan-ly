const btn_edit = document.querySelector(".btn-edit");
const btn_save = document.querySelector(".btn-save");
const btn_close = document.querySelector(".btn-close");

const input_name = document.getElementById("name");
btn_edit.addEventListener("click", () => {
	btn_edit.style.display = "none";
	input_name.disabled = false;
	btn_close.style.display = "block";
	btn_save.style.display = "block";
});
btn_close.addEventListener("click", () => {
	btn_edit.style.display = "block";
	input_name.disabled = true;
	btn_close.style.display = "none";
	btn_save.style.display = "none";
});
