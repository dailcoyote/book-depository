import http from "../common/http-common";

class BookDataService {
    getAll() {
        return http.get("/books/list");
    }

    get(id) {
        return http.get(`/books/${id}`);
    }

    create(data) {
        return http.post("/books", data);
    }

    update(id, data) {
        return http.put(`/books/${id}`, data);
    }

    delete(id) {
        return http.delete(`/books/${id}`);
    }
}

export default new BookDataService();