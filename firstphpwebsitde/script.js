function editUser(id, name, email) {
    document.getElementById('userId').value = id;
    document.getElementById('userName').value = name;
    document.getElementById('userEmail').value = email;
    document.querySelector('button[value="add"]').style.display = 'none';
    document.querySelector('button[value="update"]').style.display = 'inline-block';
}