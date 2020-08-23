import http from "../common/http-common";

class AuthorDataService {
    getAll() {
        return http.get("/authors");
    }

    getShortList() {
        return http.get("/authors/short-list");
    }

    get(id) {
        return http.get(`/authors/${id}`);
    }

    create(data) {
        return http.post("/authors", data);
    }

    update(id, data) {
        return http.put(`/authors/${id}`, data);
    }

    delete(id) {
        return http.delete(`/authors/${id}`);
    }
}

export default new AuthorDataService();