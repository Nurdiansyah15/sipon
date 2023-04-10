const shortProfile = document.getElementById("short-profile");
const line = document.getElementById("line");
const profileItem = document.getElementById("profile-item");
const contentTitle = document.getElementById("content-title");
const btnLogout = document.getElementById("button-logout");
const x = window.matchMedia("(max-width: 768px)");

function move(x) {
    if (x.matches) {
        btnLogout.innerHTML = `Logout`;
        btnLogout.classList.add = "btn-circle";
        line.style.display = "none";
        profileItem.style.display = "none";
        contentTitle.style.position = "absolute";
        shortProfile.onclick = function () {
            if (line.style.display === "none") {
                line.style.display = "block";
                profileItem.style.display = "block";
            } else {
                line.style.display = "none";
                profileItem.style.display = "none";
            }
        };
    } else {
        shortProfile.onclick = "";
        line.style.display = "block";
        profileItem.style.display = "block";
        contentTitle.style.position = "static";
    }
}

move(x);
x.addEventListener("change", function (event) {
    move(event.target);
});
