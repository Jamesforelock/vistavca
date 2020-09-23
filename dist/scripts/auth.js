
const changeBackground = async () => { // Асинхронная функция смены фона
    const formWrapper = document.getElementsByClassName("formWrapper")[0] // Выбор блока
    let i = 2 // Переменная-счетчик
    setInterval(() => { // Установка интервала (первый аргумент - функция, второй - миллисекунды)
        formWrapper.style.backgroundImage = `url(./i/auth/0${i}.jpg)` // Смена фона
        i++ // Увеличение счетчика
        if (i == 4) i = 1 // Если счетчик == 4, начать сначала
    }, 7000)
}

changeBackground() // Запуск функции смены фона