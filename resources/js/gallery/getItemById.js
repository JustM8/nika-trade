const data = {
    name: "Система «Універсал 30»",
    id: 12,
    description: "lolool",
    galleries_id: [6],
    gallery: {
        data: {
            row_0: "Мілітарі 3",
            row_1: "м. Київ, ТЦ «Епіцентр», вул. Полярна, 20Д 2",
            row_2: "2014 3",
            row_3: "Експопанелі",
            row_4: "qweqwe qwe qweqwe",
        },
        gallery: [
            "https://picsum.photos/200/300",
            "https://picsum.photos/200/300",
            "https://picsum.photos/200/300",
        ],
        thumbnail: "/storage/xC6oETeMnsbnMyWr_1716544500.jpg",
    },
};

const isDev = window.location.href.match("http://127.0.0.1:8000/");
const baseUrl = "/category-with-galleries";
export const getItemById = (id) => {
    console.log("Requested id:", id); // Log the id parameter
    return isDev
        ? Promise.resolve({ data: data })
        : axios.get(`${baseUrl}/${id}`);
};
