import api from "./Api";

class AuthorsService {
    getAll() {
        return api.get("/authors");
    }
}

export default new AuthorsService();