const toggle = document.querySelector(".toggle-nav");
const nav = document.getElementById("sidebar");

toggle.addEventListener("click", () => {
	nav.classList.toggle("mini-sidebar");
});

if (window.innerWidth < 768) {
	nav.classList.add("mini-sidebar");
}

function activeLink() {
	setTimeout(() => {
		const navLinks = document.querySelectorAll(".item-link li");
		const navLinkHasChild = document.querySelectorAll("li.has-child");
		const listLinkChild = document.querySelectorAll(".child-link li");

		const windowPathNameUrl = window.location.pathname;
		navLinks.forEach((link) => {
			var getTagNameAs = link.querySelectorAll(".name-link a");
			getTagNameAs.forEach((route) => {
				// if (route != null) {
				const _pathNameUrl = new URL(route.href).pathname;
				if (
					windowPathNameUrl == _pathNameUrl ||
					(windowPathNameUrl == "void(0)" && _pathNameUrl == "void(0)")
				) {
					link.classList.add("active");
				}
				//}
			});
		});
		navLinkHasChild.forEach((child) => {
			child.addEventListener("click", () => {
				navLinks.forEach((l) => {
					l.classList.remove("active");
				});
				child.classList.add("active");
			});
		});
		listLinkChild.forEach((child) => {
			var getTagNameAChild = child.querySelectorAll("a");

			getTagNameAChild.forEach((r) => {
				const _pathNameChildUrl = new URL(r.href).pathname;
				if (
					windowPathNameUrl == _pathNameChildUrl ||
					(windowPathNameUrl == "void(0)" && _pathNameChildUrl == "void(0)")
				) {
					child.classList.add("active-child");
				}
				checkActive();
			});
		});
	}, 50);
}

function checkActive() {
	setTimeout(() => {
		const navLinkHasChild = document.querySelectorAll("li.has-child");
		const listLinkChild = document.querySelectorAll(".child-link li");
		listLinkChild.forEach((child) => {
			if (child.classList.contains("active-child")) {
				navLinkHasChild.forEach((_child) => {
					_child.classList.add("active");
				});
			}
		});
	}, 50);
}

//Sidebar Menu
class MenuItem {
	id;
	parentId;
	icon;
	title;
	route;
	isPermission;
	children = [MenuItem];

	constructor(id, parentId, icon, title, route, isPermission, children) {
		this.id = id;
		this.parentId = parentId;
		this.icon = icon;
		this.title = title;
		this.route = route;
		this.isPermission = isPermission;
		this.children = children;
	}
}

function getMenuItems() {
	return [
		new MenuItem("1", "", `<i class="fa-solid fa-house"></i>`, "Home", "home", 1, []),
		// new MenuItem("2", "", `<i class="fa-solid fa-sliders"></i>`, "Slider", "slider", 1, []),
		new MenuItem("3", "", `<i class="fa-brands fa-medium"></i>`, "Tabs", "tab", 1, []),
		new MenuItem("4", "", `<i class="fa-regular fa-images"></i>`, "Posts", "posts", 1, []),
		// new MenuItem("4", "", `<i class="fa-solid fa-cookie-bite"></i>`, "Item", "javascript:void(0)", [
		// 	new MenuItem("c1", "4", `<i class="fa-solid fa-check"></i>`, "Item1", "item1.html"),
		// 	new MenuItem("c2", "4", `<i class="fa-solid fa-check"></i>`, "Item2", "item2.html"),
		// 	new MenuItem("c3", "4", `<i class="fa-solid fa-check"></i>`, "Item3", "javascript:void(0)"),
		// 	new MenuItem("c3", "4", `<i class="fa-solid fa-check"></i>`, "Item4", "javascript:void(0)"),
		// ])
	];
}
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

function loadMenuItems() {
	// let countMenu = arr.length;
	let listMenu = document.querySelector("ul.item-link");
	listMenu.innerHTML = "";
	let arr = getMenuItems();
	getDataUser(function (value) {
		console.log("value", value);
		arr.forEach((item) => {
			if (value != null && value != undefined) {
				if (item.isPermission == value[0].type) {
					let newLi = document.createElement("li");
					let newDiv = document.createElement("div");
					newDiv.classList.add("name-link");
					let newA = document.createElement("a");
					newA.href = item.route;
					let icon = document.createElement("span");
					icon.innerHTML = item.icon;
					let text = document.createElement("span");
					text.classList.add("text");
					text.innerText = item.title;

					newA.appendChild(icon);
					newA.appendChild(text);
					newDiv.appendChild(newA);
					newLi.appendChild(newDiv);
					if (item.children != null && item.children.length > 0) {
						let ulChilds = document.createElement("ul");
						let iconDown = document.createElement("span");
						iconDown.classList.add("icon");
						iconDown.innerHTML = `<i class="fa-solid fa-angle-down"></i>`;
						newDiv.appendChild(iconDown);
						ulChilds.classList.add("child-link");
						item.children.forEach((child) => {
							newLi.classList.add("has-child");
							let liChild = document.createElement("li");
							let aChild = document.createElement("a");
							aChild.href = child.route;
							let spanIcon = document.createElement("span");
							spanIcon.innerHTML = child.icon;
							let spanChild = document.createElement("span");
							spanChild.innerText = child.title;

							aChild.appendChild(spanIcon);
							aChild.appendChild(spanChild);

							liChild.appendChild(aChild);

							ulChilds.appendChild(liChild);

							newLi.appendChild(ulChilds);
						});
					}

					listMenu.appendChild(newLi);
				}
			}
		});
	});
}

loadMenuItems();
activeLink();

//Header
const action = ".action";
const classAction = document.querySelector(action);
const boxProfile = document.querySelector(".profile");
boxProfile.addEventListener("click", () => {
	setTimeout(() => {
		if (!classAction.classList.contains("active")) {
			classAction.classList.add("active");
		}
	}, 0);
});
document.addEventListener("click", (e) => {
	const isClosest = e.target.closest(action);
	if (!isClosest && classAction.classList.contains("active")) {
		classAction.classList.remove("active");
	}
});
