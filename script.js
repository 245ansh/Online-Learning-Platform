document.addEventListener("DOMContentLoaded", () => {
    const courseList = document.getElementById("course-list");

    // Fetch courses from PHP
    fetch("courses.php")
        .then((response) => response.json())
        .then((courses) => {
            courses.forEach((course) => {
                const courseCard = document.createElement("div");
                courseCard.className = "course-card";
                courseCard.innerHTML = `
                    <h3>${course.title}</h3>
                    <p>${course.description.substring(0, 50)}...</p>
                    <a href="course.html?id=${course.id}" class="btn">View Details</a>
                `;
                courseList.appendChild(courseCard);
            });
        });
});
document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const courseId = urlParams.get("id");

    if (courseId) {
        fetch("courses.php")
            .then((response) => response.json())
            .then((courses) => {
                const course = courses.find((c) => c.id == courseId);
                if (course) {
                    document.getElementById("course-title").textContent = course.title;
                    document.getElementById("course-description").textContent = course.description;
                }
            });
    }
});
