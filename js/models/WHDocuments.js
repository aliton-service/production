if(!aliton) {
    alert('�������� ������, ��������� ������� ����� �� ��������')
}

function WHDocuments() {
    aliton.model.apply(this, arguments)
    table = 'WHDocuments'
    this.prop = {
        docm_id: null,
        dctp_id: null,
    }
}