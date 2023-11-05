document.addEventListener('alpine:init', () => {
    Alpine.data('data', () => ({
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },

        isOtherUserOptionsMenuOpen: false,
        toggleOtherUserOptionsMenu() {
            this.isOtherUserOptionsMenuOpen = !this.isOtherUserOptionsMenuOpen
        },

        closeOtherUserOptionsMenu() {
            this.isOtherUserOptionsMenuOpen = false
        },

        isLangMenuOpen: false,
        toggleLangMenu() {
            this.isLangMenuOpen = !this.isLangMenuOpen
        },

        closeLangMenu() {
            this.isLangMenuOpen = false
        },

        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },

        closeSideMenu() {
            this.isSideMenuOpen = false
        },

        isMultiLevelMenuOpen: false,
        toggleMultiLevelMenu() {
            this.isMultiLevelMenuOpen = !this.isMultiLevelMenuOpen
        }
    }))
})
