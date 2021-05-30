function Editor({attributes, setAttributes}) {
    return (
        <div className="hero">
            <h1>Hello, {attributes.title}</h1>
        </div>
    );
}

export default Editor;