class LoginTab {

    activeTab(id) {
        $(id + '-tab').addClass('active');
        $(id).addClass('active');
    }

    disableTab(id){
        $(id + '-tab').removeClass('active');
        $(id).removeClass('active');
    }

    selectTab() {
        const scream  = location.hash;
        const registerString = '#new-register';
        const accessString  = '#access';

        if(scream ===  registerString){
            this.activeTab(registerString);
            this.disableTab(accessString);
        }
        else{
            this.activeTab(accessString);
            this.disableTab(registerString);
        }
    }

}

export { LoginTab };
