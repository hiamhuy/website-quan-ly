const btn_edit = document.querySelector(".btn-edit");
const btn_save = document.querySelector(".btn-save");
const btn_close = document.querySelector(".btn-close");
const input_name = document.getElementById("name");

//file
const file = document.getElementById("avatar");

if (
	(btn_edit != null || btn_edit != undefined) &&
	(btn_save != null || btn_save != undefined) &&
	(btn_close != null || btn_close != undefined)
) {
	btn_edit.addEventListener("click", () => {
		btn_edit.style.display = "none";
		input_name.disabled = false;
		btn_close.style.display = "block";
		btn_save.style.display = "block";
		file.disabled = false;
	});
	btn_close.addEventListener("click", () => {
		btn_edit.style.display = "block";
		input_name.disabled = true;
		btn_close.style.display = "none";
		btn_save.style.display = "none";
		file.disabled = true;
	});
}

// input file
const label = document.querySelector(".label-avatar");
const image_preview = document.querySelector("#imgpreview");

function getDataUser(callback) {
	$.ajax({
		url: "./admin/core/getSession.php",
		type: "GET",
		dataType: "json",
		success: function (data) {
			callback(data);
		},
		error: function (xhr, status, error) {
			console.log("error get data: ", error);
		},
	});
}

file.addEventListener("change", (e) => {
	label.innerHTML = `<i class="fa-solid fa-upload"></i> Choose a
	file`;
	if (e.target.files && e.target.files.length > 0) {
		const getSizeImage = e.target.files[0].size;
		if (getSizeImage > 1024 * 1024) {
			alert("Chỉ cho phép tải tệp tin nhỏ hơn 1MB");
		} else {
			var nameFile = e.target.files[0].name;
			label.innerHTML = `${nameFile}`;
			const reader = new FileReader();
			reader.addEventListener("load", (e) => {
				image_preview.src = e.target.result;
			});
			reader.readAsDataURL(e.target.files[0]);
		}
	} else {
		getDataUser(function (data) {
			if (data[0]["avatar"] != null) {
				let avatarSession = data[0]["avatar"];
				image_preview.src = `./admin/assets/thumb-info/${avatarSession}`;
			} else {
				image_preview.src = "./admin/assets/thumb-info/admin.png";
			}
		});
	}
});
