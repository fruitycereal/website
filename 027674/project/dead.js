document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tab");
    const upcomingContainer = document.querySelector(".upcoming");
    const pastDueContainer = document.querySelector(".past-due");
    const completedContainer = document.querySelector(".completed");


    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            tabs.forEach(t => t.classList.remove("active"));  
            this.classList.add("active");  


            upcomingContainer.style.display = "none";
            pastDueContainer.style.display = "none";
            completedContainer.style.display = "none";


            if (this.id === "upcoming-tab") {
                upcomingContainer.style.display = "block";
            } else if (this.id === "past-due-tab") {
                pastDueContainer.style.display = "block";
            } else if (this.id === "completed-tab") {
                completedContainer.style.display = "block";
            }
        });
    });


    document.querySelectorAll(".project-container li").forEach(item => {
        item.addEventListener("click", function () {
            const projectLink = this.querySelector("a");
            if (projectLink) {
                window.location.href = projectLink.href; 
            }
        });
    });
});
