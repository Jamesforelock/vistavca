const smoothAppear = async (elem) => {
    for (let i = 0; i<1; i = i + 0.1) {
        setTimeout(() => {elem.style.opacity = String(i)}, 100)
    }
}