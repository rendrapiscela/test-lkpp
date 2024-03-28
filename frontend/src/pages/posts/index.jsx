//import createSignal dan createEffect
import { createSignal, createEffect } from "solid-js";

//import from @solidjs/router
import { A, useParams } from "@solidjs/router";
//import services api
import api from "../../services/api";

export default function PostIndex() {
  //init state
  const [posts, setPosts] = createSignal([]);
  //destruct id from params
  const { id } = useParams();

  //define method "fetchDataPosts"
  const fetchDataPosts = async () => {
    //fetch data from API with Axios
    await api.get(`/api/jdih-filter/${id}`).then((response) => {
      //assign response data to state "posts"
      setPosts(response.data)
      // setPosts(response.data.data.data);
    });
  };

  //run hook createEffect
  createEffect(() => {
    //call method "fetchDataPosts"
    fetchDataPosts();
  }, []);

    //method deletePost
    const deletePost = async (id) => {
      //delete with api
      await api.delete(`/api/jdih/${id}`).then(() => {
        //call method "fetchDataPosts"
        fetchDataPosts();
      });
    };

  return (
    <div className="row mt-5">
      <div className="col-md-12">
        <div className="card border-0 shadow rounded">
          <div className="card-body">
            <table className="table table-bordered">
              <thead className="bg-dark text-white">
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Regulation</th>
                  <th scope="col">Link</th>
                  <th scope="col">Type Id</th>
                  <th scope="col">Name</th>
                </tr>
              </thead>
              <tbody>
                {posts().length > 0 ? (
                  posts().map((post, index) => (
                    <tr key={index}>
                      <td>{post.title}</td>
                      <td>{post.regulation}</td>
                      <td>{post.link}</td>
                      <td>{post.typeId}</td>
                      <td>{post.typename}</td>
                    </tr>
                  ))
                ) : (
                  <tr>
                    <td colSpan="5" className="text-center">
                      <div className="alert alert-danger mb-0">
                        Data Belum Tersedia!
                      </div>
                    </td>
                  </tr>
                )}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  );
}