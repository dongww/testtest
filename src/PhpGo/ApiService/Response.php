<?php
/**
 * User: dongww
 * Date: 2016/2/17
 * Time: 11:30
 */
namespace PhpGo\ApiService;

use Httpful\Response as HttpfulResponse;

/**
 * 对 Api 请求进行处理后给出的反馈进行封装
 *
 * @package ApiBundle
 */
class Response
{
    const CODE_200 = 200;
    const CODE_201 = 201;
    const CODE_204 = 204;
    const CODE_400 = 400;
    const CODE_403 = 403;

    const FORMAT_JSON = 'json';
    const FORMAT_XML  = 'xml';

    /**
     * @var HttpfulResponse
     */
    protected $httpfulResponse;

    public function __construct(HttpfulResponse $httpfulResponse)
    {
        $this->httpfulResponse = $httpfulResponse;
        ;

        if (!in_array($this->getCode(), [self::CODE_200, self::CODE_201, self::CODE_204])) {
            throw new Exception(
                $this->getRaw(),
                $this->getCode()
            );
        }
    }

    /**
     * @return int 获取状态编码
     */
    public function getCode()
    {
        return $this->httpfulResponse->code;
    }

    /**
     * @return string
     */
    public function getRaw()
    {
        return $this->httpfulResponse->raw_body;
    }

    public function getObject($type, $format = Response::FORMAT_JSON)
    {
        return ApiService::$serializer->deserialize(
            $this->getRaw(),
            $type,
            $format
        );
    }

    public function getHeader($name)
    {
        return $this->httpfulResponse->headers->offsetGet($name);
    }
}
