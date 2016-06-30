if(!aliton) {
    alert('Возникла ошибка, некоторые функции могут не работать')
}

function WHDocuments() {
    aliton.model.apply(this, arguments)
    table = 'WHDocuments'
    this.prop = {
        docm_id: null,
        dctp_id: null,
    }
}