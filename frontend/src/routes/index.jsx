import { Route } from "@solidjs/router";

//import views home
import Home from "../pages/home";

//import views posts jdih
import PostIndex from "../pages/posts/index";
// import PostCreate from "../pages/posts/create";
// import PostEdit from "../pages/posts/edit";

export default function Routes() {
  return (
    <>
      <Route path="/" component={PostIndex} />
      <Route path="/jdih" component={PostIndex} />
      <Route path="/jdih/:id" component={PostIndex} />
    </>
  );
}