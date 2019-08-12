function confirmDeletion(id) {
    var confirmPrompt = confirm("Are you sure you want to delete this record?");
    if ( confirmPrompt == true )
    {
        window.location.assign("delete.php?id=" + id);
    }
}