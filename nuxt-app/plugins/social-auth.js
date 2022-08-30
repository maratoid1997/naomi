export default function({ app, $auth }) {
    if (!$auth.loggedIn) return false;

    const strategy = $auth.strategy.name;
    const token = $auth.strategy.token.get().substr(7);

    if (strategy === "facebook" || strategy === "google") {
        app.store.dispatch("user/socialLogin", { strategy, token });
    }
}