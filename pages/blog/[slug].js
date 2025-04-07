import fs from "fs";
import path from "path";
import matter from "gray-matter";

export async function getStaticProps({ params }) {
  const post = matter.read(path.join(process.cwd(), "content/blog", `${params.slug}.md`));
  return { props: { post } };
}

export default function BlogPost({ post }) {
  return (
    <article>
      <h1>{post.data.title}</h1>
      <img src={post.data.image} />
      <div dangerouslySetInnerHTML={{ __html: post.content }} />
    </article>
  );
}