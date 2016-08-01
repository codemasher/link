<?php

namespace Psr\Http\Link;

/**
 * An evolvable link value object.
 */
interface EvolvableLinkInterface extends LinkInterface
{
    /**
     * Returns an instance with the specified href.
     *
     * @param string $href
     *   The href value to include.  It must be one of:
     *     - An absolute URI, as defined by RFC 5988.
     *     - A relative URI, as defined by RFC 5988. The base of the relative link
     *       is assumed to be known based on context by the client.
     *     - A URI template as defined by RFC 6570.
     *     - An object implementing __toString() that produces one of the above
     *       values.
     *
     * An implementing library SHOULD evaluate a passed object to a string
     * immediately rather than waiting for it to be returned later.
     *
     * @return self
     */
    public function withHref($href);

    /**
     * Returns an instance with a specified templated value set.
     *
     * @param bool $templated
     *   True if the link object should be templated, False otherwise.
     * @return self
     */
    public function withTemplated($templated);

    /**
     * Returns an instance with the specified relationship included.
     *
     * If the specified rel is already present, this methid MUST return
     * normally without errors, but without adding the rel a second time.
     *
     * @param string $rel
     *   The relationship value to add.
     * @return self
     */
    public function withRel($rel);

    /**
     * Returns an instance with the specified relationship excluded.
     *
     * If the specified rel is already not present, this method MUST return
     * normally without errors.
     *
     * @param string $rel
     *   The relationship value to exclude.
     * @return self
     */
    public function withoutRel($rel);

    /**
     * Returns an instance with the specified attribute added.
     *
     * @param string $attribute
     *   The attribute to include.
     * @param string $value
     *   The value of the attribute to set.
     * @return self
     */
    public function withAttribute($attribute, $value);
}