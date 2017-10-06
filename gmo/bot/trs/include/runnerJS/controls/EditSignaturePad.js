Runner.controls.EditSignaturePad = Runner.extend(Runner.controls.Control, {
    required: false,
    bgColor: '#ffffff',
    constructor: function (cfg) {
        this.addEvent(["change", "keyup"]);
        Runner.controls.EditSignaturePad.superclass.constructor.call(this, cfg);
        this.required = this.getFieldSetting("required");
        this.bgColor = this.getFieldSetting("bgColor");
        if (this.required) {
            this.addValidation("IsRequired");
        }
        $('.sigPad').signaturePad({
            drawOnly: true,
            bgColour: this.bgColor
        });
    },
    isEmpty: function () {
        return this.getValue().toString() == "";
    },
    getForSubmit: function () {
        if (!this.appearOnPage()) {
            return [];
        }
        return [this.valueElem.clone().val(this.getValue())];
    }
});
Runner.controls.constants["EditSignaturePad"] = "EditSignaturePad";
