const editUserForm = document.getElementById('editUserForm');

function handleEdit(data) {
    editUserForm.querySelectorAll('[name]').forEach(element=>{
      const elementType = element.getAttribute('name');
        element.value = data[elementType];
    })

}


// announcement 
const editAnnouncementForm = document.getElementById('announcementForm');
const submitAnnouncementBtn = document.getElementById('submitAnnouncementBtn');
const announcementModalLabel = document.getElementById('announcementModalLabel');
const createAnnouncementBtn = document.getElementById('createAnnouncementBtn');

createAnnouncementBtn.addEventListener('click', ()=>{
    editAnnouncementForm.reset();
    announcementModalLabel.innerText = "Create Announcement;"
    submitAnnouncementBtn.innerText = "Create"
    submitAnnouncementBtn.setAttribute('name', 'createAnnouncement');
    editAnnouncementForm.setAttribute("action","php/announcements/addAnnouncement.php");
})



function editAnnouncement(data){
    announcementModalLabel.innerText = "Edit Announcement;"
    submitAnnouncementBtn.innerText = "Save Changes"
    submitAnnouncementBtn.setAttribute('name', 'editAnnouncement');
    editAnnouncementForm.setAttribute("action","php/announcements/editAnnouncement.php");
    editAnnouncementForm.querySelectorAll('[name]').forEach(element =>{
        const elementType = element.getAttribute('name');
        element.value = data[elementType];
    })
}

