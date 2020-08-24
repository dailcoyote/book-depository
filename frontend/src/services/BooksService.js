import api from "./Api";

class BooksService {
    getAll() {
        return api.get("/books/list");
    }
    getByAuthorId(id) {
        return api.get(`/books/list?author_id=${id}`);
    }
}

export default new BooksService();