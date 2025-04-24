export function init() {
    const flash = document.getElementById("flash");

    if (flash) {
        setTimeout(() => {
            flash.remove();
        }, 5000);
    }
}
