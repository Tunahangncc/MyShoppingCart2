function selectObjectValueChange() {
    const messageTypeSelect = document.querySelector('.message-type-select');

    if (messageTypeSelect.value == 'Message Type') {
        messageTypeSelect.classList.remove('selectMessageType');
        messageTypeSelect.classList.add('unSelectMessageType');
    } else {
        messageTypeSelect.classList.remove('unSelectMessageType');
        messageTypeSelect.classList.add('selectMessageType');
    }
}
