class IntlTelInputElement extends HTMLElement {
    constructor() {
        super()

        this.inputElement = document.createElement("input")
        this.inputElement.type = 'text'
    }

    connectedCallback() {
        this.appendChild(this.inputElement)
        intlTelInput(this.inputElement, {
            hiddenInput: this.name,
            autoPlaceholder: 'aggressive',
            pattern: 'Mobile Number',
            preferredCountries: ['mm', 'us', 'gb', 'au', 'eg', 'de','sa','tr','th', 'my', 'sg', 'jp','ca', 'es', 'om', 'np', 'be', 'ae', 'nz', 'it', 'bq'],
            utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.2/js/utils.js'
        })
    }
}

customElements.define('intl-tel-input', IntlTelInputElement)